<?php
	session_start();
	/**
	 * 
	 */
	
	class Session
	{
		
		public function __construct()
		{
			if(!(isset($_SESSION["user_name"]) && isset($_SESSION["user_email"]) && isset($_SESSION["user_id"])&& isset($_SESSION["user_type"])))
			{
				header("location:index.php");
				die();
			}
		}
		
	}
?>