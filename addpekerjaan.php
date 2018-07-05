<?php
	define (DB_USER, "root");
	define (DB_PASSWORD, "");
	define (DB_DATABASE, "db_oreo");
	define (DB_HOST, "localhost");
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

	$notiket = $_POST["notiket"];
	$unit = $_POST["unit_pekerjaan"];
	$volume = $_POST["volume_pekerjaan"];
 


	if(!empty($_POST["name_pekerjaan"])){

	 	foreach ($_POST["name_pekerjaan"] as $key => $value) {
	 		$units =  $unit[$key];
	 		$volumes =  $volume[$key];
					$sql = "INSERT INTO tb_pekerjaan(namapekerjaan,notiket,unit,volume) VALUES ('".$value."','$notiket','".$units."','".$volumes."')";
					$mysqli->query($sql);
		}
		echo json_encode(['success'=>'Names Inserted successfully.']);
	}else{
		echo 'isi oi';
	}
?>