<?php
class Bill_topupModel extends Database{
	protected $db;
	public function __construct(){
		$this->db = new Database();
		$this->db->connect();
	}
	public function all()
	{
		$sql = 'SELECT user.name,bill_topup.time_created, banking.amount,bill_topup.idbank, bill_topup.idbanking, bank.price, banking.idadmin FROM bill_topup LEFT join bank on bill_topup.idbank = bank.id left join banking on bill_topup.idbanking = banking.id left join user on bill_topup.iduser = user.id';
		$result = $this->db->conn->query($sql);
		while ($data = $result->fetch_array()) {
			$list[] = $data;
		}
		return $list;
	}
	public function insert($idbank, $iduser, $idbanking ,$time)
	{
		$sql = "INSERT into bill_topup(idbank, iduser, idbanking ,time_created) VALUES($idbank, $iduser, $idbanking ,'$time')";
		$this->db->conn->query($sql);
	}
	public function get($id)
	{
		$sql = "SELECT * FROM bill_topup WHERE id = $id";
		$result = $this->db->conn->query($sql);
		return $result->fetch_array();
	}
	public function count()
	{
		$sql = "SELECT COUNT(*) as 'count'  FROM bill_topup ";
		$result = $this->db->conn->query($sql);
		$data = $result->fetch_array();
		return $data['count'];
	}

} 
?>