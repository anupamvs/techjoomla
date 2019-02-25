<?php
	/**
	 * 
	 */
	require_once("../helpers/database.php");
	class DashController
	{
		public $db;
		function __construct()
		{
			# code...
			$this->db=new Database();
		}
		public function getCategoryCount()
		{
			$sql="SELECT count(cat_id) AS c FROM category";
			$result=$this->db->select($sql);
			return ($result["c"]);
		}
		public function getProductCount()
		{
			$sql="SELECT count(pro_id) AS c FROM product";
			$result=$this->db->select($sql);
			return ($result["c"]);
		}
		public function getProductCountByCategory($catid)
		{
			$sql="SELECT count(pro_id) AS c FROM product WHERE pro_cat=".$catid;
			$result=$this->db->select($sql);
			return ($result["c"]);
		}

		public function getProduct($post)
		{
			$sql="";
			$temp=array();
			if($post["category"]=="all")
			{
				$temp["total_product"]=$this->getProductCount();
				$sql="SELECT * FROM `product` INNER JOIN `category` ON product.pro_cat=category.cat_id WHERE 1";
			}
			else
			{
				$temp["total_product"]=$this->getProductCountByCategory($post["category"]);
				$sql="SELECT * FROM `product` INNER JOIN `category` ON product.pro_cat=category.cat_id WHERE pro_cat=".$post["category"];
			}
			$result=$this->getResultSet($sql,$post["page"]);
			echo json_encode(array_merge($temp,$result));
		}
		public function getResultSet($sql,$page)
		{
			$data=array();
			$data["page"]=$page;
			$offset=($page-1)*20;
			$limit=$offset.",20";
			$sql=$sql." LIMIT ".$limit;
			//$data["total_pages"]=(int)($data["total_product"]/20)+1;
			$data["product_result"]=$this->db->selectAll($sql);
			return $data;
		}
		public function searchProduct($post)
		{
			$temp=array();
			$sql="SELECT * FROM `product` WHERE pro_name LIKE '%".$_POST["keyword"]."%' OR pro_desc LIKE '%".$post['keyword']."%'";
			$result=$this->getResultSet($sql,$_POST["page"]);
			echo json_encode($result);
		}
	}
	if(isset($_POST["operation"]))
	{
		$dash=new DashController();
		switch ($_POST["operation"]) {
			case 'set':
				# code...
				$data=array();
				$data["total_category"]=$dash->getCategoryCount();
				$data["total_product"]=$dash->getProductCount();
				//print_r($data);
				echo json_encode($data);
				break;
			case 'getProduct':
				$dash->getProduct($_POST);
				break;
			case 'search':
				# code...
				$dash->searchProduct($_POST);
				break;
			default:
				# code...
				die();
				break;
		}
	}
?>