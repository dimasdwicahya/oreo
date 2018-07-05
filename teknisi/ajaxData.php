<?php
//Include the database configuration file
include ('../dbConfig.php');

if(!empty($_POST["kd_regional"])){
    //Fetch all WITEL data
    $query = $db->query("SELECT * FROM tb_witel WHERE kd_regional = ".$_POST['kd_regional']." ORDER BY witel ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //LIST WITEL
    if($rowCount > 0){
        echo '<option value="">Pilih Witel</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['kd_witel'].'">'.$row['witel'].'</option>';
        }
    }else{
        echo '<option value="">Witel Tidak Tersedia</option>';
    }
    }elseif(!empty($_POST["kd_witel"])){
    $query = $db->query("
                        SELECT tb_sto.sto,tb_sto.kd_sto, tb_datel.datel 
                        FROM tb_sto 
                        INNER JOIN tb_datel ON tb_sto.kd_datel = tb_datel.kd_datel WHERE kd_witel = ".$_POST['kd_witel']." ORDER BY datel ASC
             ");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    

    //LIST STO
    if($rowCount > 0){
       echo'
       
       <option value="" name="sto" id="sto">Pilih STO</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option id="sto" value="'.$row['kd_sto'].'">'.$row['datel'].' <b> '.$row['sto'].' </b> </option>';
            
            
        }
       


    }else{
        echo '<option value="">STO Tidak Tersedia</option>';
    }
}
 
?>

