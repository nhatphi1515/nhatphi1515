<?php  
class PostModel extends Database
{
	protected $db;
	function __construct()
	{
		$this->db = new Database();
		$this->db->connect();
	}
	public function Post($idbrand, $color, $title, $price, $idprovince, $address, $descript, $img, $iduser, $time)
	{
		$sql="INSERT INTO news(idbrand,idcolor,title,price,idprovince,address,descript,img, iduser, status, condtn, time_created) values($idbrand,$color,'$title',$price,$idprovince,'$address','$descript','$img',$iduser, 'chưa được thuê', 'chờ duyệt', '$time')";
		$this->db->conn->query($sql);
	}
	public function Select($idcategory, $brand, $city, $min, $max, $color)
	{
		$sql="SELECT news.*, brand.idcategory FROM news INNER JOIN brand ON news.idbrand = brand.id WHERE condtn = 'đã duyệt' AND idcategory = $idcategory";
		if ($min == 1);
		else if($max) $sql.=" AND price BETWEEN $min AND $max";
		else $sql.=" AND price > $min";
		if ($brand!=0) {
			$sql.=" AND idbrand = $brand";
		}
		if ($city!=0) {
			$sql.=" AND idprovince = $city";
		}
		if ($color!=0) {
			$sql.=" AND idcolor = $color";
		}
		$result = $this->db->conn->query($sql);
		$list = array();
		while($data = $result->fetch_array()){
			$list[] = $data;
		}
		return $list;
	}
	public function getColor()
	{
		$sql="SELECT * FROM color";
		$result = $this->db->conn->query($sql);
		$list = array();
		while($data = $result->fetch_array()){
			$list[] = $data;
		}
		return $list;
	}
	public function all()
	{
		$sql="SELECT * FROM news WHERE condtn = 'đã duyệt'  ORDER by time_created DESC";
		$result = $this->db->conn->query($sql);
		$list = array();
		while($data = $result->fetch_array()){
			$list[] = $data;
		}
		return $list;
	}
	public function list()
	{
		$sql="SELECT * FROM news ";
		$result = $this->db->conn->query($sql);
		$list = array();
		while($data = $result->fetch_array()){
			$list[] = $data;
		}
		return $list;
	}
	public function listBytype($category)
	{
		$sql="SELECT news.*, brand.idcategory FROM news INNER JOIN brand ON news.idbrand = brand.id WHERE idcategory = $category";
		$result = $this->db->conn->query($sql);
		$list = array();
		while($data = $result->fetch_array()){
			$list[] = $data;
		}
		return $list;
	}
	public function listByUser($iduser)
	{
		$sql="SELECT news.title,news.descript,bill.condtn,news.img,news.id,bill.return_date,bill.rent_date FROM news LEFT JOIN bill ON news.id = bill.idnews WHERE news.iduser = $iduser ORDER BY news.title DESC,bill.return_date DESC"; 
		$result = $this->db->conn->query($sql);
		$list = array();
		while($data = $result->fetch_array()){
			$list[] = $data;
		}
		return $list;
	}
	public function listBillByUser($iduser)
	{
		$sql="SELECT bill.condtn,news.title,news.img,news.price,news.iduser,order_status.id,bill.return_date,bill.rent_date,order_status.status FROM news RIGHT JOIN bill ON news.id = bill.idnews RIGHT JOIN order_status on bill.id = order_status.idbill WHERE news.iduser = $iduser ORDER BY bill.return_date DESC"; 
		$result = $this->db->conn->query($sql);
		$list = array();
		while($data = $result->fetch_array()){
			$list[] = $data;
		}
		return $list;
	}
	public function listBillByRental($iduser)
	{
		$sql="SELECT bill.condtn,news.title,news.img,news.price,news.iduser,order_status.id,bill.return_date,bill.rent_date,order_status.status FROM news RIGHT JOIN bill ON news.id = bill.idnews RIGHT JOIN order_status on bill.id = order_status.idbill WHERE bill.iduser = $iduser ORDER BY bill.return_date DESC"; 
		$result = $this->db->conn->query($sql);
		$list = array();
		while($data = $result->fetch_array()){
			$list[] = $data;
		}
		return $list;
	}

	public function getNews($id)
	{
		$sql="SELECT * FROM news WHERE id = $id"; 
		$result = $this->db->conn->query($sql);
		$data = $result->fetch_array();
		return $data;
	}
	public function updateCondition($id, $cdtn)
	{
		$sql="UPDATE news SET condtn = '$cdtn' WHERE id = $id"; 
		$this->db->conn->query($sql);
	}
	public function count()
	{
		$sql = "SELECT COUNT(*) as 'count'  FROM news ";
		$result = $this->db->conn->query($sql);
		$data = $result->fetch_array();
		return $data['count'];
	}
	public function find($content)
	{
		$sql = "SELECT * FROM news WHERE title LIKE '%$content%'";
		$result = $this->db->conn->query($sql);
		$list = array();
		while($data = $result->fetch_array()){
			$list[] = $data;
		}
		return $list;
	}

}
?>