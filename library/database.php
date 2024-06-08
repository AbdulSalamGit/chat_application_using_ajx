<?php
	$mysqli_driver = new mysqli_driver();
	$mysqli_driver->report_mode = MYSQLI_REPORT_OFF;
	
	class Database
	{
		public  $connection  = null;
		private $query		 = null;
		private $result 	 =  null;
		
		public function __construct($host_name, $user_name, $password, $database)
		{
			$this->connection = mysqli_connect($host_name, $user_name, $password, $database);
		
			if(mysqli_connect_errno())
			{
				echo "<p style='color: red'><b>Database Connection Problem !...</b></p>";
				echo "<p style='color: red'><b>Error No: </b>".mysqli_connect_errno()."</p>";
				echo "<p style='color: red'><b>Error Message: </b>".mysqli_connect_error()."</p>";
			}
		}
		
		public function execute_query($query)
		{
			$this->query = $query;
			
			$this->result = mysqli_query($this->connection, $this->query) or die("<p style='color: red'><b>Error No: </b>".mysqli_errno($this->connection)."</p><p style='color: red'><b>Error Message: </b>".mysqli_error($this->connection)."</p>");
			
			return $this->result;
		}
		
		public function __destruct()
		{
			mysqli_close($this->connection);
		}
	}
?>