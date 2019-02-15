<?php
	//$name=$_POST["category_name"];
	//$desc=$_POST["category_description"];
	$name="test";
	$desc="test";
	require_once("../helpers/db.php");
	$db=new db();
	$sql="INSERT INTO `category`( `cat_name`, `cat_desc`) VALUES ('".$name."','".$desc."')";
	echo $sql;
	if($db->query($sql))
		echo json_encode("{'status':'success'}");
	else
		echo json_encode("{'status':'fail'}");
?>