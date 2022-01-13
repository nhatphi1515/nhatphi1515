<?php
class UserModel extends Database{
	protected $db;
	public function __construct(){
		$this->db = new Database();
		$this->db->connect();
	}
	public function signup($name, $pass, $account, $email, $dob, $phone, $sex, $fid, $bid){
		$sql = "INSERT INTO user(name,account,password,email,dayofbirth,phonenumber,sex,frontid,backid,coin,role,avatar)
					values ('$name','$account','$pass','$email','$dob',$phone,'$sex','$fid','$bid',0,'visitor','avt-default.png')";
		if($this->db->conn->query($sql)){
			$id = $this->db->conn->insert_id;
			$sql = "SELECT * FROM user WHERE id = $id";
			$result = $this->db->conn->query($sql);
			return $result->fetch_array();
		};
	}
	public function signin($username, $pass){
		$sql = "SELECT * FROM user WHERE account = '$username' AND password = '$pass'";
		$result = $this->db->conn->query($sql);
		return $result;
	}
	public function checkExistsAccount($account) {
		$sql = "SELECT * FROM user WHERE account = '$account'";
		$result = $this->db->conn->query($sql);
		return $result;
	}
	public function all()
	{
		$sql = 'SELECT * FROM user';
		$result = $this->db->conn->query($sql);
		while ($data = $result->fetch_array()) {
			$list[] = $data;
		}
		return $list;
	}
	public function del($id)
	{
		$sql = 'DELETE FROM user WHERE id = $id';
	}
	public function getUser($id)
	{
		$sql = "SELECT * FROM user WHERE id = $id";
		$result = $this->db->conn->query($sql);
		return $result->fetch_array();
	}
	public function count()
	{
		$sql = "SELECT COUNT(*) as 'count'  FROM user ";
		$result = $this->db->conn->query($sql);
		$data = $result->fetch_array();
		return $data['count'];
	}
	public function minusCoin($iduser, $coin)
	{
		$sql = "UPDATE user SET coin = coin - $coin WHERE id = $iduser ";
		$this->db->conn->query($sql);
	}
	public function addCoin($iduser, $coin)
	{
		$sql = "UPDATE user SET coin = coin + $coin WHERE id = $iduser ";
		$this->db->conn->query($sql);
	}
	public function permission($id, $role)
	{
		$sql = "UPDATE user SET role = '$role' where id = $id";
		$result = $this->db->conn->query($sql);
	}

} 
?>