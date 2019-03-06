<?php
	require_once("../helpers/database.php");
	require_once('Session.php');
	class CategoryController extends Session
	{
		private $db;
		private $id;
		private $name;
		private $description;
		public function __construct()
		{
			parent::__construct();
			$this->db = new database();

		}
		public function setAttributes($name,$description)
		{
			$this->name=$name;
			$this->description=$description;
		}
		public function setId($id)
		{
			$this->id=$id;
		}
		public function addCategory()
		{
			$sql="INSERT INTO `category`( `cat_name`, `cat_desc`, `created_by`) VALUES ('".$this->name."','".$this->description."',".$_SESSION["user_id"].")";
			if($this->db->query($sql))
				echo json_encode(["status"=>"success","message"=>"Category Added","title"=>"Success"]);
			else
				echo json_encode(["status"=>"error","message"=>"Category Not Added","title"=>"Failed"]);
		}
		public function updateCategory()
		{
			$sql="UPDATE `category` SET `cat_name`='".$this->name."',`cat_desc`='".$this->description."' WHERE `cat_id`=".$this->id;
			if($this->db->query($sql))
				echo json_encode(["status"=>"success","message"=>"Category Updated","title"=>"Success"]);
			else
				echo json_encode(["status"=>"error","message"=>"Category Not Updated","title"=>"Failed"]);
		}
		public function deleteCategory()
		{
			$sql="DELETE FROM `category` WHERE cat_id=".$this->id;
			if($this->db->query($sql))
				echo json_encode(["status"=>"success","message"=>"Category Deleted","title"=>"Success"]);
			else
				echo json_encode(["status"=>"error","message"=>"Category Not Deleted","title"=>"Failed"]);
		}
		public function getCategory()
		{
			$data=array();
			$sql="SELECT * FROM `category` WHERE cat_id=".$this->id;
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
				$cat->setAttributes($_POST["category_name"],$_POST["category_description"]);
				$cat->addCategory();
				break;
			case 'update':
				$cat->setAttributes($_POST["category_name"],$_POST["category_description"]);
				$cat->setId($_POST["category_id"]);
				$cat->updateCategory();
				break;
			case 'delete':
				$cat->setId($_POST["category_id"]);
				$cat->deleteCategory();
				break;
			case 'getAll':
				# code...
				$cat->getAllCategory();
				break;
			case 'get':
				# code...
				$cat->setId($_POST["category_id"]);
				$cat->getCategory();
				break;
			default:
				echo json_encode(["status"=>"warning","message"=>"Unknown Operation","title"=>"Invalid"]);;
				die;
				break;
		}
	}
?>