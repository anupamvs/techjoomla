<?php
	class database
	{
		protected $dns="localhost";
		protected $user="root";
		protected $pass="root";
		protected $database="anupam_ecom";
		protected $con;
		function __construct()
		{
			$this->con=new Mysqli($this->dns,$this->user,$this->pass,$this->database);
			if(!$this->con)
				return (["error"=>$this->con->connect_error]);
		}
		function query($sql)
		{
			if($this->con->query($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
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
			if($result->num_rows>0)
				return ($result->fetch_assoc());
		}
	}
?>
