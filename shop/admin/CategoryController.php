<?php
	require_once("../helpers/database.php");
	require_once('Session.php');
	require_once('Category.php');
	if(isset($_POST["operation"]))
	{
		$cat=new Category();
		switch ($_POST["operation"]) 
		{
			case 'add':
				# code...
				$cat->setAttributes($_POST["category_name"],$_POST["category_description"]);
				$cat->add();
				break;
			case 'update':
				$cat->setAttributes($_POST["category_name"],$_POST["category_description"]);
				$cat->setId($_POST["category_id"]);
				$cat->update();
				break;
			case 'delete':
				$cat->setId($_POST["category_id"]);
				$cat->delete();
				break;
			case 'getAll':
				# code...
				$cat->getAll();
				break;
			case 'get':
				# code...
				$cat->setId($_POST["category_id"]);
				$cat->get();
				break;
			default:
				echo json_encode(["status"=>"warning","message"=>"Unknown Operation","title"=>"Invalid"]);;
				die;
				break;
		}
	}
?>