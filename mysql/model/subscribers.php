<?php
require_once 'mysql/database.php';
class subscribers{
	public $db;
	function __construct(){
		$this->db=new database("localhost","root","","sample");
	}
	public  function getSubscribers($userId){
		$sql="SELECT * FROM subcribers where userId=:userId";
		$arr=['userId'=>$userId];
		$this->db->execQuery($sql,$arr);
		if(!$this->db->execQuery($sql,$arr)){
			$this->db->getDayta();
			$std=new stdClass();
			$std=$this->db->data;
			return $std;
		}
		else{
			return "not working";
		}
		
}
}
?>