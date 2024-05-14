<?php

class database
{
	public $connection 	= NULL;
	public $query 		= NULL;
	public $result		= NULL;

	public function __construct()
	{
		$localhost 	= "localhost";
		$username 	= "root";
		$password	= "";
		$db_name 	= "chat_application";

		$this->connection = mysqli_connect($localhost, $username, $password, $db_name);

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