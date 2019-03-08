<?php
	class Category
	{
		private $db;
		private $id;
		private $name;
		private $description;
		public function __construct()
		{
			$this->db=Database::getInstance();

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
		public function add()
		{
			$sql="INSERT INTO `category`( `cat_name`, `cat_desc`, `created_by`) VALUES ('".$this->name."','".$this->description."',".$_SESSION["user_id"].")";
			if($this->db->query($sql))
				echo json_encode(["status"=>"success","message"=>"Category Added","title"=>"Success"]);
			else
				echo json_encode(["status"=>"error","message"=>"Category Not Added","title"=>"Failed"]);
		}
		public function update()
		{
			$sql="UPDATE `category` SET `cat_name`='".$this->name."',`cat_desc`='".$this->description."' WHERE `cat_id`=".$this->id;
			if($this->db->query($sql))
				echo json_encode(["status"=>"success","message"=>"Category Updated","title"=>"Success"]);
			else
				echo json_encode(["status"=>"error","message"=>"Category Not Updated","title"=>"Failed"]);
		}
		public function delete()
		{
			$sql="DELETE FROM `category` WHERE cat_id=".$this->id;
			if($this->db->query($sql))
				echo json_encode(["status"=>"success","message"=>"Category Deleted","title"=>"Success"]);
			else
				echo json_encode(["status"=>"error","message"=>"Category Not Deleted","title"=>"Failed"]);
		}
		public function get()
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
		public function getAll()
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
?>