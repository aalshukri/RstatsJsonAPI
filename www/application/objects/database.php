<?php
// used to get mysql database connection
class Database{
 
	// database credentials
	private $host = "localhost";
	private $db_name = "api_db";
	private $username = "root";
	private $password = "";
	public $conn;

	// get the database connection
	public function getConnection()
	{
		return false;
	}
}

 
