<?php

class BlogModel extends Database{
	protected $db;
	public function __construct(){
		$this->db = new Database();
		$this->db->connect();
	}
	public function all()
	{
		$sql = 'SELECT * FROM blog';
		$result = $this->db->conn->query($sql);
		while ($data = $result->fetch_array()) {
			$list[] = $data;
		}
		return $list;
	}
	public function get($id)
	{
		$sql = "SELECT * FROM blog WHERE id = $id";
		$result = $this->db->conn->query($sql);
		return $result->fetch_array();
	}
}
?>