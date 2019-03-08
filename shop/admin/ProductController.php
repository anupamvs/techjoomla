<?php
	require_once("../helpers/database.php");
	require_once('Session.php');
	require_once('Product.php');
	// class ProductContoller extends Session
	// {
	// 	private $id;
	// 	private $db;
	// 	private $name;
	// 	private $image;
	// 	private $category;
	// 	private $description;
	// 	private $price;
	// 	public function __construct()
	// 	{
	// 		parent::__construct();
	// 		$this->db=database::getInstance();
	// 	}
	// 	public function setAttributes($name,$image,$category,$description,$price)
	// 	{
	// 		$this->name=$name;
	// 		$this->image=$image;
	// 		$this->category=$category;
	// 		$this->description=$description;
	// 		$this->price=$price;
	// 	}
	// 	public function setId($id)
	// 	{
	// 		$this->id=$id;
	// 	}
	// 	public function add()
	// 	{
	// 		$loc="../assets/uploads/".time().uniqid(rand()).basename($this->image["name"]);
	// 		if(move_uploaded_file($this->image["tmp_name"], $loc))
	// 		{
	// 			$date = date('YYYY-MM-DD HH:MI:SS');
	// 			$sql="INSERT INTO `product`(`pro_name`, `pro_image`, `pro_cat`, `pro_desc`, `pro_price`, `added_by`) VALUES ('".$this->name."','".$loc."',".$this->category.",'".$this->description."',".$this->price.",".$_SESSION["user_id"].")";
	// 			if($this->db->query($sql))
	// 				echo json_encode(["status"=>"success","message"=>"Product Added","title"=>"Success"]);
	// 			else
	// 				echo json_encode(["status"=>"error","message"=>"Product Not Added","title"=>"Failed"]);
	// 		}
	// 		else
	// 			echo json_encode(["status"=>"error","message"=>"Product Not Added","title"=>"Image Uplaod Fail"]);
			
	// 	}
	// 	public function update()
	// 	{
	// 		if(empty($this->image))
	// 		{
	// 			$sql="UPDATE `product` SET `pro_name`='".$this->name."',`pro_cat`=".(int)$this->category.",`pro_desc`='".$this->description."',`pro_price`='".$this->price."' WHERE pro_id=".$this->id;
	// 			if($this->db->query($sql))
	// 					echo json_encode(["status"=>"success","message"=>"Product Updated","title"=>"Success"]);
	// 				else
	// 					echo json_encode(["status"=>"error","message"=>"Product Not Updated","title"=>"Failed"]);
	// 		}
	// 		else
	// 		{
	// 			$loc="../assets/uploads/".time().uniqid(rand()).basename($this->image["name"]);
				
	// 			if(move_uploaded_file($this->image["tmp_name"], $loc))
	// 			{
	// 				$sql="UPDATE `product` SET `pro_name`='".$this->name."',`pro_image`='".$loc."',`pro_cat`=".(int)$this->category.",`pro_desc`='".$this->description."',`pro_price`='".$this->price."' WHERE pro_id=".(int)$this->id;
	// 				if($this->db->query($sql))
	// 					echo json_encode(["status"=>"success","message"=>"Product Updated","title"=>"Success"]);
	// 				else
	// 					echo json_encode(["status"=>"error","message"=>"Product Not Updated","title"=>"Failed"]);
	// 			}
	// 			else
	// 				echo json_encode(["status"=>"error","message"=>"Product Not Updated","title"=>"Image Uplaod Fail"]);
	// 		}
	// 	}
	// 	public function delete()
	// 	{
	// 		$sql="DELETE FROM `product` WHERE pro_id=".$this->id;
	// 		if($this->db->query($sql))
	// 			echo json_encode(["status"=>"success","message"=>"Product Deleted","title"=>"Success"]);
	// 		else
	// 			echo json_encode(["status"=>"error","message"=>"Product Not Deleted","title"=>"Failed"]);
	// 	}
	// 	public function get()
	// 	{
	// 		$data=array();
	// 		$sql="SELECT * FROM `product` INNER JOIN category on product.pro_cat=category.cat_id and product.pro_id=".$this->id;
	// 		$result=$this->db->select($sql);
	// 		if($result==null)
	// 			$data["total"]=0;
	// 		else
	// 			$data["total"]=count([$result]);
	// 		$data["result"]=$result;
	// 		echo json_encode($data);
	// 	}
	// 	public function getAll()
	// 	{
	// 		$sql="SELECT * FROM `product` INNER JOIN category on product.pro_cat=category.cat_id";
	// 		$result=$this->db->selectAll($sql);
	// 		if($result==null)
	// 			$data["total"]=0;
	// 		else
	// 			$data["total"]=count($result);
	// 		$data["results"]=$result;
	// 		unset($result);
	// 		echo json_encode($data);
	// 	}
	// }
	if(isset($_POST["operation"]))
	{
		$pro=new Product();
		switch ($_POST["operation"]) 
		{
			case 'addPro':
				# code...
				$pro->setAttributes($_POST["product_name"],$_FILES["product_image"],$_POST["product_category"],$_POST["product_description"],$_POST["product_price"]);
				$pro->add();
				break;
			case 'updatePro':
				$image;
				if(empty($_FILES["product_image"]))
					$image=array();
				else
					$image=$_FILES["product_image"];
				$pro->setAttributes($_POST["product_name"],$image,$_POST["product_category"],$_POST["product_description"],$_POST["product_price"]);
				$pro->setId((int)$_POST["product_id"]);
				$pro->update();
				break;
			case 'deletePro':
				$pro->setId((int)$_POST["pro_id"]);
				$pro->delete();
				break;
			case 'getAllPro':
				# code...
				$pro->getAll();
				break;
			case 'getPro':
				# code...
				$pro->setId((int)$_POST["pro_id"]);
				$pro->get();
				break;
			default:
				# code...
				break;
		}
	}
?>