<?php
//Include the database configuration file
include 'dbConfig.php';
//Fetch all the country data
$query = $db->query("SELECT * FROM tb_regional ORDER BY regional ASC");
//Count total number of rows
$rowCount = $query->num_rows;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Form Input Order</title>
    </head>
    <body>
        <!--  FUNGSI UNTUK NO TIKETING -->
        <?php
        //no tiket otomatis
        $carikode = $db->query("SELECT max(notiket) from tb_tiket");
        // menjadikannya array
        $datakode = mysqli_fetch_array($carikode);
        // jika $datakode
        if ($datakode) {
        $nilaikode = substr($datakode[0], 1);
        // menjadikan $nilaikode ( int )
        $kode = (int) $nilaikode;
        // setiap $kode di tambah 1
        $kode = $kode + 1;
        $kode_otomatis = "P".str_pad($kode, 4, "0", STR_PAD_LEFT);
        } else {
        $kode_otomatis = "P0001";
        }
        ?>
        <header>
            <h3>Form Input Order</h3>
        </header>
        
        <form action="proses-input-order.php" method="POST" enctype="multipart/form-data">
            
            <table>
                <tr>
                    <td>
                        <label for="nama">Nama Pekerjaan: </label>
                    </td>
                    <td>
                        <input type="text" name="namapekerjaan" placeholder="nama pekerjaan" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="notiket">No Tiket: </label>
                    </td>
                    <td>
                        <?php echo '<input type="text" name="notiket" placeholder="nomor tiket" value="'.$kode_otomatis.'" required/>' ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="lokasi">Lokasi: </label>
                    </td>
                    <td>
                        <input type="text" name="lokasi" placeholder="Lokasi" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="regional">Regional: </label>
                    </td>
                    <td><select id="regional" name='regional'>
                        <option value="" >Pilih Regional</option>
                        <?php
                        if($rowCount > 0){
                        while($row = $query->fetch_assoc()){
                        echo '<option value="'.$row['kd_regional'].'">'.$row['regional'].'</option>';
                        }
                        }else{
                        echo '<option value="">Data regional tidak tersedia</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="witel">Witel: </label>
                </td><td>
                <select id="witel" name="witel">
                    <option value="" name="witel">Pilih Witel</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="datel">STO: </label>
            </td><td>
            <select id="sto" name="sto">
                <option value="">Pilih STO</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>
            
        </td>
        <td>
            
        </td>
    </tr>
    <tr>
        <tr>
            <td>
                <label for="penyebab">Penyebab: </label>
            </td>
            <td>
                <textarea name="penyebab" placeholder="Tuliskan penyebab disini">
                
                </textarea>
            </td>
            <tr>
                <td>
                    <label for="foto_lampiran">Lampiran: </label>
                </td>
                <td>
                    <input type="file" name="foto_lampiran" placeholder="Lampiran (Foto)" />
                </td>
                <tr>
                    <td>
                        <input type="reset" value="Draft" name="draft" />
                    </td>
                    <td>
                        <button type="submit" id="button" value="Submit" name="daftar" >Save</button>
                        
                        
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
$('#regional').on('change',function(){
var kd_regional = $(this).val();
if(kd_regional){
$.ajax({
type:'POST',
url:'ajaxData.php',
data:'kd_regional='+kd_regional,
success:function(html){
$('#witel').html(html);
$('#sto').html('<option value="" name="witel">Pilih Witel</option>');
}
});
}else{
$('#witel').html('<option value="" name="witel">Pilih Regional terlebih dahulu</option>');
$('#sto').html('<option value="" name="witel">Pilih Witel terlebih dahulu</option>');
}
});

$('#witel').on('change',function(){
var kd_witel = $(this).val();
if(kd_witel){
$.ajax({
type:'POST',
url:'ajaxData.php',
data:'kd_witel='+kd_witel,
success:function(html){
$('#sto').html(html);
}
});
}else{
$('#sto').html('<option value="" >Select STO first</option>');
}
});
});

</script>