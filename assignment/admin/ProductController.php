<?php
	require_once("../helpers/database.php");
	require_once('Session.php');
	class ProductContoller extends Session
	{
		public $db;
		public function __construct()
		{
			parent::__construct();
			$this->db=new database();
		}
		public function addProduct($data)
		{
			$loc="../assets/uploads/".time().uniqid(rand()).basename($_FILES["product_image"]["name"]);
			if(move_uploaded_file($_FILES["product_image"]["tmp_name"], $loc))
			{
				$date = date('YYYY-MM-DD HH:MI:SS');
				$sql="INSERT INTO `product`(`pro_name`, `pro_image`, `pro_cat`, `pro_desc`, `pro_price`, `added_by`) VALUES ('".$_POST['product_name']."','".$loc."',".$_POST['product_category'].",'".$_POST['product_description']."',".$_POST["product_price"].",".$_SESSION["user_id"].")";
				if($this->db->query($sql))
					echo json_encode(["status"=>"success","message"=>"Product Added","title"=>"Success"]);
				else
					echo json_encode(["status"=>"error","message"=>"Product Not Added","title"=>"Failed"]);
			}
			else
				echo json_encode(["status"=>"error","message"=>"Product Not Added","title"=>"Image Uplaod Fail"]);
			
		}
		public function updateProduct($post,$file)
		{
			if(empty($file))
			{
				$sql="UPDATE `product` SET `pro_name`='".$post["product_name"]."',`pro_cat`=".(int)$post["product_category"].",`pro_desc`='".$post["product_description"]."',`pro_price`='".$post["product_price"]."' WHERE pro_id=".(int)$post["product_id"];
				if($this->db->query($sql))
						echo json_encode(["status"=>"success","message"=>"Product Updated","title"=>"Success"]);
					else
						echo json_encode(["status"=>"error","message"=>"Product Not Updated","title"=>"Failed"]);
			}
			else
			{
				$loc="../assets/uploads/".time().uniqid(rand()).basename($_FILES["product_image"]["name"]);
				
				if(move_uploaded_file($_FILES["product_image"]["tmp_name"], $loc))
				{
					$sql="UPDATE `product` SET `pro_name`='".$post["product_name"]."',`pro_image`='".$loc."',`pro_cat`=".(int)$post["product_category"].",`pro_desc`='".$post["product_description"]."',`pro_price`='".$post["product_price"]."' WHERE pro_id=".(int)$post["product_id"];
					if($this->db->query($sql))
						echo json_encode(["status"=>"success","message"=>"Product Updated","title"=>"Success"]);
					else
						echo json_encode(["status"=>"error","message"=>"Product Not Updated","title"=>"Failed"]);
				}
				else
					echo json_encode(["status"=>"error","message"=>"Product Not Updated","title"=>"Image Uplaod Fail"]);
			}
		}
		public function deleteProduct($post)
		{
			$sql="DELETE FROM `product` WHERE pro_id=".(int)$post["pro_id"];
			if($this->db->query($sql))
				echo json_encode(["status"=>"success","message"=>"Product Deleted","title"=>"Success"]);
			else
				echo json_encode(["status"=>"error","message"=>"Product Not Deleted","title"=>"Failed"]);
		}
		public function getProduct($post)
		{
			$data=array();
			$sql="SELECT * FROM `product` INNER JOIN category on product.pro_cat=category.cat_id and product.pro_id=".(int)$post["pro_id"];
			$result=$this->db->select($sql);
			if($result==null)
				$data["total"]=0;
			else
				$data["total"]=count([$result]);
			$data["result"]=$result;
			echo json_encode($data);
		}
		public function getAllProuct()
		{
			$sql="SELECT * FROM `product` INNER JOIN category on product.pro_cat=category.cat_id";
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
		$pro=new ProductContoller();
		switch ($_POST["operation"]) 
		{
			case 'addPro':
				# code...
				$pro->addProduct($_POST);
				break;
			case 'updatePro':
				$pro->updateProduct($_POST,$_FILES);
				break;
			case 'deletePro':
				$pro->deleteProduct($_POST);
				break;
			case 'getAllPro':
				# code...
				$pro->getAllProuct();
				break;
			case 'getPro':
				# code...
				$pro->getProduct($_POST);
				break;
			default:
				# code...
				break;
		}
	}
?>