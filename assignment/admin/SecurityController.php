<?php
	session_start();
	/**
	 * 
	 */
	require_once("../helpers/database.php");
	class SecurityController
	{
		
		function __construct()
		{
			# code...
		}
		public function login($post)
		{
			$data=array();
			$db=new Database();
			$sql="SELECT * FROM `euser` WHERE user_email='".$post["email"]."' and user_password='".md5($_POST["pass"])."'";
			$result=$db->select($sql);
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
				$_SESSION["user_type"]=$result["user_type"];
				$_SESSION["user_id"]=$result["user_id"];
			}
			//print_r($result);
			// $data["result"]=$result;
			// echo json_encode($data);
			//print_r($_SESSION);
			echo json_encode($data);
		}
		public function logout()
		{
			session_unset();
			header("location:index.php");
			die();
		}
	}
	if(isset($_POST["operation"]))
	{
		$session=new SecurityController();
		switch ($_POST["operation"]) 
		{
			case 'login':
				# code...
				$session->login($_POST);
				break;
			case 'logout':
				$session->logout();
				break;
			default:
				# code...
				break;
		}
	}
?>