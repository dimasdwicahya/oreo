<?php
	define (DB_USER, "root");
	define (DB_PASSWORD, "");
	define (DB_DATABASE, "db_oreo");
	define (DB_HOST, "localhost");
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

	$notiket = $_POST["notiket"];
	$unit = $_POST["unit"];
	$volume = $_POST["volume"];
 


	if(!empty($_POST["name"])){

	 	foreach ($_POST["name"] as $key => $value) {
	 		$units =  $unit[$key];
	 		$volumes =  $volume[$key];
					$sql = "INSERT INTO tb_material(material,notiket,unit,volume) VALUES ('".$value."','$notiket','".$units."','".$volumes."')";
					$mysqli->query($sql);
		}
		echo json_encode(['success'=>'Names Inserted successfully.']);
	}else{
		echo 'isi oi';
	}
?>