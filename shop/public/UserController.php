<?php
	/**
	 * 
	 */
	session_start();
	require_once("../helpers/database.php");
	class UserController
	{
		private $db;
		private $name;
		private $email;
		private $type;
		private $password;
		function __construct()
		{
			# code...
			$this->db=new Database();
		}
		public function setAttributes($name,$email,$password)
		{
			$this->name=$name;
			$this->email=$email;
			$this->password=$password;
		}
		public function login()
		{
			$data=array();
			$sql="SELECT * FROM `euser` WHERE user_email='".$this->email."' and user_password='".md5($this->password)."'";
			//print_r($sql);
			//1di1e();
			$result=$this->db->select($sql);
			if($result==null)
			{
				$data["status"]="fail";
				$data["message"]="Invalid Credentials";
			}
			else
			{
				$data["status"]="success";
				$_SESSION["user_name"]=$result["user_name"];
				$_SESSION["user_email"]=$result["user_email"];
				$_SESSION["user_id"]=$result["user_id"];
				//print_r($_COOKIE);
				if(isset($_COOKIE["product"]))
				{
					//echo "Working";
					$products=explode(" ",$_COOKIE["product"]);
					foreach ($products as $k=>$v) 
					{
						$this->addToCartPre(["product"=>$v]);
					}
					setcookie("product", "", time() - 3600);
				}
			}
			echo json_encode($data);
		}
		public function newUser()
		{
			$sql="INSERT INTO `euser`( `user_name`, `user_email`, `user_password`) VALUES ('".$this->name."','".$this->email."','".md5($this->password)."')";
			if($this->db->query($sql))
				echo json_encode(["status"=>"success","message"=>"Register Succesfully","title"=>"Success"]);
			else
				echo json_encode(["status"=>"error","message"=>"Not Registered","title"=>"Failed"]);
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
		public function addToCart($post)
		{
			$data = array();
			if(!(isset($_SESSION["user_name"]) && isset($_SESSION["user_email"]) && isset($_SESSION["user_id"])))
			{
				// $data["status"]="warning";
				// $data["message"]="Login First";
				// $data["title"]="Warning";
				// echo json_encode($data);
				// die();
				$products=array();
				if(isset($_COOKIE["product"]))
				{
					$products=explode(" ",$_COOKIE["product"]);
				}
				$products[]=$post["product"];
				setcookie("product",implode(" ",$products));
			}
			else
			{
				$sql="INSERT INTO `cart`(`p_id`, `c_id`) VALUES (".$post["product"].",".$_SESSION["user_id"].")";
				if($this->db->query($sql))
					echo json_encode(["status"=>"success","message"=>"Product Added To Cart","title"=>"Success"]);
				else
					echo json_encode(["status"=>"error","message"=>"Failed To Add","title"=>"Failed"]);
			}
		}
		public function addToCartPre($post)
		{
			$sql="INSERT INTO `cart`(`p_id`, `c_id`) VALUES (".$post["product"].",".$_SESSION["user_id"].")";
			$this->db->query($sql);
		}
		public function loadCart()
		{
			$sql="SELECT product.pro_name,product.pro_image,product.pro_price,category.cat_name,cart.id FROM (((product INNER JOIN category ON product.pro_cat=category.cat_id)INNER JOIN cart ON product.pro_id=cart.p_id)INNER JOIN euser ON cart.c_id=euser.user_id) WHERE euser.user_id=".$_SESSION["user_id"];
			$result=$this->db->selectAll($sql);
			if($result==null)
				$data["total"]=0;
			else
				$data["total"]=count($result);
			$data["results"]=$result;
			unset($result);
			echo json_encode($data);
		}
		public function deleteCart($post)
		{
			$sql="DELETE FROM `cart` WHERE id=".$post["c"]." AND c_id=".$_SESSION["user_id"];
			if($this->db->query($sql))
				echo json_encode(["status"=>"success","message"=>"Product Deleted From Cart","title"=>"Success"]);
			else
				echo json_encode(["status"=>"error","message"=>"Product Not Deleted From Cart","title"=>"Failed"]);
		}
	}
	if(isset($_POST["operation"]))
	{
		$user=new UserController();
		switch ($_POST["operation"]) {
			case 'login':
				# code...
				$user->setAttributes("demo",$_POST['email'],$_POST['pass']);
				$user->login();
				break;
			case 'signup':
				$user->setAttributes($_POST['name'],$_POST['email'],$_POST['pass']);
				$user->newUser();
				break;
			case 'getAll':
				# code...
				$user->getAllCategory();
					break;
			case 'addToCart':
				# code...
				$user->addToCart($_POST);
				die();
			case 'loadCart':
				# code...
				$user->loadCart();
				break;
			case 'deleteCart':
				$user->deleteCart($_POST);
				# code...
				break;
			default:
				# code...
				die();
				break;
		}
	}
?>