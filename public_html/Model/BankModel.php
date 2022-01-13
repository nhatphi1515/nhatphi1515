<?php

class BankModel extends Database{
	protected $db;
	public function __construct(){
		$this->db = new Database();
		$this->db->connect();
	}
	public function check($seri, $code)
	{
		$sql = "SELECT * FROM bank WHERE seri = '$seri' AND code = '$code'";
		$result = $this->db->conn->query($sql);
		return $result;

	}
	public function topup($id, $coin, $iduser){
		$fee = $coin*0.1;
		$coin -= $fee;
		$sql = "UPDATE user SET coin = coin + $coin WHERE id = $iduser";
		$this->db->conn->query($sql);
		$sql = "UPDATE bank SET status = 'expire' WHERE id = $id";
		$this->db->conn->query($sql);
		return $coin;
	}
}
?>