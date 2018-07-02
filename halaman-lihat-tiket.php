<?php

include ("dbconfig.php");

$sql = "
SELECT tb_order.id,tb_order.namapekerjaan,tb_order.notiket,tb_order.lokasi,tb_order.kd_witel,tb_order.kd_sto,tb_order.penyebab,tb_order.lampiran, tb_witel.witel, tb_tiket.tanggal_buat,tb_tiket.status
FROM ((tb_order
INNER JOIN tb_witel ON tb_order.kd_witel = tb_witel.kd_witel)
INNER JOIN tb_tiket ON tb_order.notiket = tb_tiket.notiket)

";

$res = mysqli_query($db,$sql);



echo"<table>
<tr>
    <td>No</td>
    <td>No Tiket</td>
    <td>Tanggal Pembuatan</td>
    <td>Nama Pekerjaan</td>
    <td>Lokasi</td>
    <td>Witel</td>
    <td>STO</td>
    <td>Penyebab</td>
    <td>Lampiran</td>
    <td>Status</td>
</tr>
";

while ($row=mysqli_fetch_array($res)) {
    
  ?>
    <tr>
    <td><?php echo $row["id"];?></td>
    <td><?php echo $row["notiket"];?></td>
    <td><?php echo $row["tanggal_buat"];?></td>
    <td><?php echo $row["namapekerjaan"];?></td>
    <td><?php echo $row["lokasi"];?></td>
    <td><?php echo $row["witel"];?></td>
    <td><?php echo $row["kd_sto"];?></td>
    <td><?php echo $row["penyebab"];?></td>
    <td><?php echo $row["lampiran"];?></td>
     <td><?php 
            if($row["status"]==1){
                echo 'Completed';
            }else{
                echo 'Progress';
            }
        ?>
    </td>

    </tr>

<?}

echo"</table>";

?>