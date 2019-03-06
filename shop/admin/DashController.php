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
		public function getUserCount()
		{
			$sql="SELECT count(user_id) AS c FROM euser";
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
				$sql="SELECT * FROM `product` INNER JOIN `category` ON product.pro_cat=category.cat_id";
			}
			else
			{
				$temp["total_product"]=$this->getProductCountByCategory($post["category"]);
				$sql="SELECT * FROM `product` INNER JOIN `category` ON product.pro_cat=category.cat_id WHERE pro_cat=".$post["category"];
			}
			$temp["total_pages"]=$this->totalPages($temp["total_product"]);
			$result=$this->getResultSet($sql,$post["page"]);
			echo json_encode(array_merge($temp,$result));
		}
		public function totalPages($totalResult)
		{
			$pages=(int)($totalResult/20)+1;
			return $pages;
		}
		public function getResultSet($sql,$page)
		{
			$data=array();
			$data["page"]=$page;
			$offset=($page-1)*20;
			$limit=$offset.",20";
			$sql=$sql." LIMIT ".$limit;
			// var_dump($limit);
			// echo $sql;
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
		public function chartData()
		{
			$data=array();
			$data["labels"]=array();
			$data["data"]=array();
			$data["color"]=array();
			$sql="SELECT category.cat_name,category.cat_color,COUNT(product.pro_id) AS pro_count FROM category LEFT JOIN product ON product.pro_cat=category.cat_id GROUP BY category.cat_name";
			$result=$this->db->selectAll($sql);
			foreach ($result as $key => $value) {
				# code...
				$data["labels"][]=$value["cat_name"];
				$data["data"][]=$value["pro_count"];
				$data["color"][]=$value["cat_color"];
			}
			echo json_encode($data);
			//print_r($data);
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
				$data["total_user"]=$dash->getUserCount();
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
			case 'chart':
				# code...
				$dash->chartData();
				break;
			default:
				# code...
				die();
				break;
		}
	}
?>