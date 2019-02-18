<?php
	require_once("../helpers/database.php");

	class category
	{
		public function __contruct()
		{
			//super::__contruct();
		}
		public function addCategory($catName,$catDesc)
		{
			$db=new database();
			$sql="INSERT INTO `category`( `cat_name`, `cat_desc`) VALUES ('".$catName."','".$catDesc."')";
			if($db->query($sql))
				echo json_encode(["status"=>"success","message"=>"Category Added","title"=>"Success"]);
			else
				echo json_encode(["status"=>"error","message"=>"Category Not Added","title"=>"Failed"]);
		}
		public function updateCategory($catId,$catName,$catDes)
		{

		}
		public function deleteCategory($catId)
		{

		}
		public function getCategory($catId)
		{
			$sql="SELECT * FROM `category` WHERE cat_id=".$catId;
		}
		public function getCategories()
		{
			$db=new database();
			$data=array();
			$sql="SELECT * FROM `category` WHERE 1";
			$result=$db->selectAll($sql);
			$data["total"]=count($result);
			$data["results"]=$result;
			unset($result);
			echo json_encode($data);
		}
	}
	if(isset($_POST["opertaion"]))
	{
		$cat=new category();
		switch ($_POST["opertaion"]) 
		{
			case 'add':
				# code...
				$cat->addCategory($_POST["category_name"],$_POST["category_description"]);
				break;
			case 'update':
				$cat->updateCategory($_POST["category_name"],$_POST["category_description"],$_POST["category_id"]);
				break;
			case 'delete':
				$cat->deleteCategory($_POST["category_id"]);
				break;
			case 'getAll':
				# code...
				$cat->getCategories();
				break;
			default:
				# code...
				break;
		}
	}
?>