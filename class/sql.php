<?php  

	class sql extends PDO {

		private $conn;

		public function __construct(){

			$this->conn = new PDO("mysql:dbname=aluizio; host=localhost","root","cwkekamq25");
			$this->conn->exec("set names utf8");
		    $this->conn->exec('SET character_set_connection=utf8');
		    $this->conn->exec('SET character_set_client=utf8');
		    $this->conn->exec('SET character_set_results=utf8');


		}

		private function setParams($statement, $parameters = array()){

			foreach ($parameters as $key => $value) {

				$this->setParam($statement, $key, $value);	
				//$this->bindParam($key,$value);
				
			}//fim do foreach

		}

		private function setParam($statement, $key, $value){
			$statement->bindParam($key, $value);

		}

		public function query ($rawQuery, $params = array()){

			$stmt = $this->conn->prepare($rawQuery);

			$this->setParams($stmt, $params);

			$stmt->execute();
			
                        return $stmt;

		}//fim query

		public function select($rawQuery,$params = array()){

			$stmt = $this->query($rawQuery,$params);
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

	}//fim da Classe PDO

?>