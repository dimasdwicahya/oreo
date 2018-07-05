<?php


	define (DB_USER, "root");
	define (DB_PASSWORD, "");
	define (DB_DATABASE, "db_oreo");
	define (DB_HOST, "localhost");
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

	$notiket = $_POST["notiket"];
 
 

	if(!empty($_POST["name"]) || !empty($_POST["unit"]) || !empty($_POST["volume"])){
		foreach ($_POST["name"] as $key => $value) {
			foreach ($_POST["unit"] as $key => $value2) {
				foreach ($_POST["volume"] as $key => $value3) {
					$sql = "INSERT INTO tb_material(material,notiket,unit,volume) VALUES ('".$value."','$notiket','".$value2."','".$value3."')";
					$mysqli->query($sql);
				}
			}
		}
		echo json_encode(['success'=>'Names Inserted successfully.']);
	}else{
		echo 'isi oi';
	}
?>