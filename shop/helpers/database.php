<?php
	class database
	{
		private $dns="localhost";
		private $user="root";
		private $pass="root";
		private $database="anupam_ecom";
		private $con;
		private static $instance;
		private function __construct()
		{
			$this->con=new Mysqli($this->dns,$this->user,$this->pass,$this->database);
			if(!$this->con)
				return (["error"=>$this->con->connect_error]);
		}
		public static function getInstance()
		{
			if(!self::$instance)
				self::$instance=new static();
			return self::$instance;
		}
		function query($sql)
		{
			if($this->con->query($sql))
				return true;
			else
				return false;
		}
		function selectAll($sql)
		{
			$data=array();
			$result=$this->con->query($sql);
			if($result->num_rows>0)
			{
				while($row=$result->fetch_assoc())
					$data[]=$row;
			}
			return ($data);
		}
		function select($sql)
		{
			$result=$this->con->query($sql);
			return ($result->fetch_assoc());
		}
		function delete($sql)
		{
			if($this->con->query($sql))
				return true;
			else
				return false;
		}
		function getCount($sql)
		{
			
		}
	}
	/**
	 * 
	 */
	class Test
	{
		private $t;
		function __construct()
		{
			# code...
			$this->t="working";
		}
	}
?>
