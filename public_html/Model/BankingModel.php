<?php
class BankingModel extends Database{
	protected $db;
	public function __construct(){
		$this->db = new Database();
		$this->db->connect();
	}
	public function all()
	{
		$sql = 'SELECT * FROM banking ';
		$result = $this->db->conn->query($sql);
		while ($data = $result->fetch_array()) {
			$list[] = $data;
		}
		return $list;
	}
	
	public function insert($idadmin, $amount, $type)
	{
		$sql = "INSERT into banking(amount, idadmin, type) VALUES($amount, $idadmin, '$type')";
		if ($this->db->conn->query($sql)) 
			$id = $this->db->conn->insert_id;
		return $id;
	}
	public function get($id)
	{
		$sql = "SELECT * FROM banking WHERE id = $id";
		$result = $this->db->conn->query($sql);
		return $result->fetch_array();
	}
	public function count()
	{
		$sql = "SELECT COUNT(*) as 'count'  FROM banking ";
		$result = $this->db->conn->query($sql);
		$data = $result->fetch_array();
		return $data['count'];
	}

} 
?>