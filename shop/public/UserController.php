<?php
	session_start();
	require_once("../helpers/database.php");
	require_once("User.php");
	if(isset($_POST["operation"]))
	{
		$user=new User();
		switch ($_POST["operation"]) {
			case 'login':
				$user->setAttributes("demo",$_POST['email'],$_POST['pass']);
				$user->login();
				break;
			case 'signup':
				$user->setAttributes($_POST['name'],$_POST['email'],$_POST['pass']);
				$user->newUser();
				break;
			case 'getAll':
				$user->getAllCategory();
					break;
			case 'addToCart':
				$user->addToCart($_POST);
				die();
			case 'loadCart':
				$user->loadCart();
				break;
			case 'deleteCart':
				$user->deleteCart($_POST);
				break;
			default:
				die();
				break;
		}
	}
?>