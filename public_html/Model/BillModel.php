<?php  
class BillModel extends Database
{
	protected $db;
	function __construct()
	{
		$this->db = new Database();
		$this->db->connect();
	}
	public function insert($iduser, $idnews, $rentday, $returndate, $time)
	{
		$sql="INSERT INTO bill(iduser,idnews,condtn,rent_date,return_date,time_created) values($iduser,$idnews,'chưa xác nhận','$rentday','$returndate','$time')" ;
		if ($this->db->conn->query($sql)) 
			$id = $this->db->conn->insert_id;
		return $id;
	}
	public function all()
	{
		$sql = "SELECT * FROM bill";
		$result = $this->db->conn->query($sql);
		while ($data = $result->fetch_array()) {
			$list[] = $data;
		}
		return $list;
	}
	public function get($id)
	{
		$sql = "SELECT bill.*, news.price FROM bill LEFT JOIN news on bill.idnews = news.id WHere bill.id = $id";
		return $this->db->conn->query($sql)->fetch_array();
	}
	public function listByStatus($status)
	{
		$sql = "SELECT * FROM bill where status = '$status'";
		$result = $this->db->conn->query($sql);
		while ($data = $result->fetch_array()) {
			$list[] = $data;
		}
		return $list;
	}
	public function listByNews($idnews, $time)
	{
		$sql = "SELECT * FROM bill where idnews = $idnews AND return_date > '$time' AND condtn = 'cho thuê'";
		$list = array();
		$result = $this->db->conn->query($sql);
		while ($data = $result->fetch_array()) {
			$list[] = $data;
		}
		return $list;
	}
	public function changeStatus($id, $status, $time)
	{
		$sql = "UPDATE bill SET status = '$status' WHERE id = $id";
		$result = $this->db->conn->query($sql);
	}
	public function listByUser($id)
	{
		$sql = "SELECT * FROM bill where iduser = $id";
		$result = $this->db->conn->query($sql);
		while ($data = $result->fetch_array()) {
			$list[] = $data;
		}
		return $list;
	}
	public function count()
	{
		$sql = "SELECT COUNT(*) as 'count'  FROM bill ";
		$result = $this->db->conn->query($sql);
		$data = $result->fetch_array();
		return $data['count'];
	}
	public function selectBill($id){
		$sql = "SELECT news.id,bill.condtn,bill.id as idbill,bill.return_date,bill.rent_date, order_status.status, user.name, user.id as iduser FROM news LEFT JOIN bill ON news.id = bill.idnews RIGHT JOIN order_status ON order_status.idbill = bill.id RIGHT JOIN user ON bill.iduser = user.id WHERE news.id = $id ORDER BY bill.return_date DESC";
		$result = $this->db->conn->query($sql);
		$list = array();
		while ($data = $result->fetch_array()) {
			$list[] = $data;
		}
		return $list;
	}
	public function updateCondition($id, $cdtn)
	{
		$sql="UPDATE bill SET condtn = '$cdtn' WHERE id = $id"; 
		$this->db->conn->query($sql);
	}
	

}
?>