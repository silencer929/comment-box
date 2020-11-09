<?php
class database {
	private $pdo=null;
	private $server=null;
	private $username=null;
	private $password=null;
	private $database=null;
	private $dbOpen=false;
	private $stmt=null;
	public $rows=null;
	public $data=null;
	function __construct($server,$username,$password,$database=false){
		$this->server=$server;
		$this->username=$username;
		$this->password=$password;
		$this->database=$database;
	}
	private function open(){
		try{
       $this->pdo=new PDO("mysql:host=$this->server;dbname=$this->database",$this->username,$this->password);
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		if($this->pdo){
			$this->dbOpen=true;
			return $this->dbOpen;
		}
	}	

		catch(PDOException $e){
			echo "connection failed:  " . $e->getMessage();
		}
	}
			
		public function execQuery($query,$arr){
			$this->open();
			if($this->pdo){
				$this->stmt=$this->pdo->prepare($query);
				if($this->stmt){
					foreach ($arr as $key => &$value) {
				$this->stmt->bindparam($key,$value);
			}
					$this->stmt->execute();
				}
			}
			else{
				return "connection failed";
			}
}
private function num_rows(){
	if($this->stmt){
		$this->rows=$this->stmt->rowCount();
		return $this->rows;
	}
}
public function getDayta(){
	if(!is_array($this->data)){
		$this->data=array();
	}
	if($this->num_rows() == 1){
		$this->data=$this->stmt->fetch(PDO::FETCH_ASSOC);
	}
	else if($this->num_rows() > 0){
		$this->data=$this->stmt->fetchAll(PDO::FETCH_OBJ);
	}
	else{
		return "data_not_found";
	}
}



}

?>