<?php
	require_once("../helpers/database.php");
	require_once('Session.php');
	class CategoryController extends Session
	{
		public $db;
		public function __construct()
		{
			parent::__construct();
			$this->db = new database();

		}
		public function addCategory($catName,$catDesc)
		{
			$sql="INSERT INTO `category`( `cat_name`, `cat_desc`) VALUES ('".$catName."','".$catDesc."')";
			if($this->db->query($sql))
				echo json_encode(["status"=>"success","message"=>"Category Added","title"=>"Success"]);
			else
				echo json_encode(["status"=>"error","message"=>"Category Not Added","title"=>"Failed"]);
		}
		public function updateCategory($catName,$catDesc,$catId)
		{
			$sql="UPDATE `category` SET `cat_name`='".$catName."',`cat_desc`='".$catDesc."' WHERE `cat_id`=".(int)$catId;
			if($this->db->query($sql))
				echo json_encode(["status"=>"success","message"=>"Category Updated","title"=>"Success"]);
			else
				echo json_encode(["status"=>"error","message"=>"Category Not Updated","title"=>"Failed"]);
		}
		public function deleteCategory($catId)
		{
			$sql="DELETE FROM `category` WHERE cat_id=".(int)$catId;
			if($this->db->query($sql))
				echo json_encode(["status"=>"success","message"=>"Category Deleted","title"=>"Success"]);
			else
				echo json_encode(["status"=>"error","message"=>"Category Not Deleted","title"=>"Failed"]);
		}
		public function getCategory($catId)
		{
			$data=array();
			$sql="SELECT * FROM `category` WHERE cat_id=".(int)$catId;
			$result=$this->db->select($sql);
			if($result==null)
				$data["total"]=0;
			else
				$data["total"]=count($result);
			$data["result"]=$result;
			echo json_encode($data);
		}
		public function getAllCategory()
		{
			$data=array();
			$sql="SELECT * FROM `category` WHERE 1";
			$result=$this->db->selectAll($sql);
			if($result==null)
				$data["total"]=0;
			else
				$data["total"]=count($result);
			$data["results"]=$result;
			unset($result);
			echo json_encode($data);
		}
	}
	if(isset($_POST["operation"]))
	{

		$cat=new CategoryController();
		switch ($_POST["operation"]) 
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
				$cat->getAllCategory();
				break;
			case 'get':
				# code...
				$cat->getCategory($_POST["category_id"]);
				break;
			default:
				echo json_encode(["status"=>"warning","message"=>"Unknown Operation","title"=>"Invalid"]);;
				die;
				break;
		}
	}
?>