<?php  
Class CommentModel extends Database{
	protected $db;
	public function __construct(){
		$this->db = new Database();
		$this->db->connect();
	}
	public function getsByNews($id)
	{
		$sql = "select comment.content,comment.time_created,user.name,user.avatar from comment left join user on comment.iduser = user.id where comment.idnews = $id";
		$result = $this->db->conn->query($sql);
		$list = array();
		while($data = $result->fetch_array()){
			$list[] = $data;
		}
		return $list;
	}
	public function getsByBlog($id)
	{
		$sql = "select comment.content,comment.time_created,user.name,user.avatar from comment left join user on comment.iduser = user.id where comment.idblog = $id";
		$result = $this->db->conn->query($sql);
		$list = array();
		while($data = $result->fetch_array()){
			$list[] = $data;
		}
		return $list;
	}
	public function insert($content, $iduser,$idnews , $idblog, $time)
	{
		$sql = "INSERT into comment(content, iduser,idnews, idblog, time_created) Values('$content',$iduser,$idnews,$idblog,'$time')";
		$this->db->conn->query($sql);
	}
	public function list()
	{
		$sql = "SELECT * from comment";
		$result = $this->db->conn->query($sql);
		while($data = $result->fetch_array()){
			$list[] = $data;
		}
		return $list;
	}
	public function count()
		{
			$sql = "SELECT COUNT(*) as 'count'  FROM comment ";
			$result = $this->db->conn->query($sql);
			$data = $result->fetch_array();
			return $data['count'];
		}
}
?>