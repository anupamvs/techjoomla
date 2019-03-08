<?php
	die();
	require_once("helpers/database.php");
	$db=database::getInstance();
	print_r($db);
	echo "<br><br>";
	$db2=database::getInstance();
	var_dump($db2);
	echo "<br><br>";
	$db3=database::getInstance();
	var_dump($db3);
	echo "<br><br>";
	$t1=new Test();
	var_dump($t1);
	echo "<br><br>";
	$t2=new Test();
	var_dump($t2);
	echo "<br><br>";
	$t3=new Test();
	var_dump($t3);
?>
