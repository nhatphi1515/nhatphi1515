<?php

class CategoryModel extends Database{
	protected $db;
	public function __construct(){
		$this->db = new Database();
		$this->db->connect();
	}
    public function all(){
		$sql = "SELECT * from category";
		$result = $this->db->conn->query($sql);
		while($data = $result->fetch_array()){
			$list[] = $data;
		}
		return $list;
	}
	public function listBrandByCategory($id){
		$sql = "SELECT * from brand WHERE idcategory = $id";
		$result = $this->db->conn->query($sql);
		while($data = $result->fetch_array()){
			$list[] = $data;
		}
		return $list;
	}
	public function getCategory($id){
		$sql = "SELECT * from category WHERE id = $id";
		$result = $this->db->conn->query($sql);
		$data = $result->fetch_array();
		return $data;
	}
}
?>