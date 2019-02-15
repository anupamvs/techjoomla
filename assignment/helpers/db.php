<?php
	class db 
	{
		protected $dns="localhost";
		protected $user="root";
		protected $pass="root";
		protected $database="anupam_ecom";
		protected $con;
		function __construct()
		{
			$this->con=new Mysqli($this->dns,$this->user,$this->pass,$this->database);
			if($this->con)
				echo "<h1>Connected!</h1>";
			else
				echo $this->con->connect_error;
		}
		function query($sql)
		{
			if($this->con->query("INSERT INTO `category`( `cat_name`, `cat_desc`) VALUES ('test','test')"))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		function __destruct()
		{
			echo "<h1>Destruct</h1>";
		}
		//function add
	}
?>
