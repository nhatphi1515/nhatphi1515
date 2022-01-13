<?php
class Order_StatusModel extends Database{
	protected $db;
	public function __construct(){
		$this->db = new Database();
		$this->db->connect();
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
	public function inserts($id,$time)
	{
		$sql="INSERT INTO order_status(status,refund,reason,idbill,time_created) values('Chưa nhận xe',0,'',$id,'$time')" ;
		$this->db->conn->query($sql);
	}
	public function update($id,$status,$refund,$reason,$time)
	{
		$sql="UPDATE order_status SET status = '$status',refund = $refund, reason = '$reason',time_created = '$time' WHERE id = $id";
		$this->db->conn->query($sql);
	}
} 
?>