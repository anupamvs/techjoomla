<?php
	/**
	 * 
	 */
	require_once("../helpers/database.php");
	require_once('Session.php');
	class DashController extends Session
	{
		public $db;
		function __construct()
		{
			# code...
			parent::__construct();
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
			
			default:
				# code...
				die();
				break;
		}
	}
?>