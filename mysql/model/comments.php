<?php
require_once "mysql/database.php";
require_once "subscribers.php";
class comment{
	private $db;
	function __construct(){
		$this->db=new database("localhost","root","","sample");
	}
	public  function getComments(){
		$std=new stdClass();
		$sql="SELECT * FROM(subcribers NATURAL JOIN comment)";
		$arr=[];
		if(!$this->db->execQuery($sql,$arr)){
			$this->db->getDayta();
			$std=$this->db->data;
		}
		return $std;
	}
	public  function insert($comment,$userId){
		$commentId="";
		$sql="INSERT INTO comment values(:commentId,:comment,:userId)";
		$arr=["commentId"=>$commentId,"comment"=>$comment,"userId"=>$userId];
		if(!$this->db->execQuery($sql,$arr)){
			$std=new stdClass();
			$std->comment=$comment;
			$std->userId=$userId;
			return $std;
		}
		return null;
	}
	public  function update(){

	}
	public function delete(){

	}

}

?>