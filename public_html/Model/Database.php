<?php 

class Database{
	public $conn = NULL;
	private $server = 'localhost';
	private $dbname = 'id16688190_thuexe2';
	private $user = 'id16688190_rent2000k';
	private $password = 'Mn123456@123456';
	public function connect(){
		$this->conn = new mysqli($this->server,$this->user,$this->password,$this->dbname);
		if ($this->conn->connect_error) {
			printf($this->conn->connect_error);
			exit();
		}
		$this->conn->set_charset("utf8");
	}
	public function closeDatabase(){
		if ($this->conn) {
			$this->conn->close();
		}
	}
}
?>