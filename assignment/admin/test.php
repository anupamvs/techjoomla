<?php
	$name=$_POST["category_name"];
	$desc=$_POST["category_description"];
	require_once("../helpers/database.php");
	$db=new database();
	$sql="INSERT INTO `category`( `cat_name`, `cat_desc`) VALUES ('".$name."','".$desc."')";
	if($db->query($sql))
		echo json_encode(["status"=>"success","message"=>"Category Added","title"=>"Success"]);
	else
		echo json_encode(["status"=>"error","message"=>"Category Not Added","title"=>"Failed"]);
?>