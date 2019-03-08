<?php
	require_once("../helpers/database.php");
	require_once("Dash.php");
	if(isset($_POST["operation"]))
	{
		$dash=new Dash();
		switch ($_POST["operation"]) {
			case 'set':
				$data=array();
				$data["total_category"]=$dash->getCategoryCount();
				$data["total_product"]=$dash->getProductCount();
				$data["total_user"]=$dash->getUserCount();
				echo json_encode($data);
				break;
			case 'getProduct':
				$dash->getProduct($_POST);
				break;
			case 'search':
				$dash->searchProduct($_POST);
				break;
			case 'chart':
				$dash->chartData();
				break;
			default:
				die();
				break;
		}
	}
?>