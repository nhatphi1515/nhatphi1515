<?php  
	class AddressModel extends Database
	{
		protected $db;
		function __construct()
		{
			$this->db = new Database();
			$this->db->connect();
		}
		public function getProvince()
		{
			$sql="SELECT * FROM province";
			$result = $this->db->conn->query($sql);
			while($data = $result->fetch_array()){
				$list[] = $data;
			}
			return $list;
		}
		public function getDistrict($id)
		{
			$sql="SELECT * FROM district WHERE _province_id = $id";
			$result = $this->db->conn->query($sql);
			while($data = $result->fetch_array()){
				$list[] = $data;
			}
			return $list;
		}
	}
?>