<?php
	class Model{
	
		public $table;
		public $id;
		
		public function read($fields=null)
		{
			if($fields==null){$fields="*";}
			
			$sql="SELECT $fields FROM ".$this->table." WHERE id=".$this->id;
			$req=mysql_query($sql) or die(mysql_error());
			$data=mysql_fetch_assoc($req);
			foreach ($data as $key => $value) {
				$this->$key=$value;
			}
			
		}
		
		public function save($data){			
			//UPDATE
			if(isset($data["id"]) && !empty($data["id"]))
			{
		
				//print_r($data);
					
				$sql="UPDATE ".$this->table." SET ";
				foreach ($data as $key => $value) {
					if($key!=='id')			
					$sql.="$key='$value',";
				}
				//suppression de la virgule
				$sql=substr($sql,0,-1);
				$sql.=" WHERE id=".$data['id'];		
		
			}
			//INSERT
			else
			{
				$sql="INSERT INTO ".$this->table."(";
				foreach ($data as $key => $value) {
					unset($data["id"]);
					$sql.="$key,";
				}
				//suppression de la virgule
				$sql=substr($sql,0,-1);
				$sql.=" ) VALUES (";
				foreach ($data as $key => $value) {
					$sql.="'$value',";
				}
				$sql=substr($sql,0,-1);
				$sql.=" )";				
			}	
			
			//echo $sql;
			//Envoie de la requete
			mysql_query($sql) or die(mysql_error()."<p> =>".mysql_query()."</p>");
			
			//init de la valeur de l'id
			if(!isset($data["id"]))
			{
				$this->id=mysql_insert_id();
			}	
			else
			{
				$this->id=$data["id"];
			}
			
			return true;
		}
		
		
		
		public function find($data=array())
		{
			$conditions="1=1";
			$fields="*";
			$limit="";
			$order=$this->table.".id DESC";
			$othertable="";
			if(isset($data["conditions"])){$conditions=$data["conditions"];}
			if(isset($data["fields"])){$fields=$data["fields"];}	
			if(isset($data["limit"])){$limit="LIMIT".$data["limit"];}
			if(isset($data["order"])){$order=$data["conditions"];}
			if(isset($data["othertable"])){$othertable=','.$data["othertable"];}
			
			
			$sql="SELECT $fields FROM ". $this->table." ".$othertable." WHERE $conditions ORDER BY $order $limit"; 
			
			//echo $sql;
			$req=mysql_query($sql) or die(mysql_error());
			$result=array();
			WHILE($data=mysql_fetch_assoc($req))
			{
				$result[]=$data;
			}
			return $result;
			
		}
		
		
		public function deleteAll($id=null)
		{
			if($id==null){$id=$this->id;}
			
			
			
			$sql="DELETE FROM ".$this->table." WHERE id=$id";
			//echo $sql;
			$req=mysql_query($sql) or die(mysql_error());		
			
		}
		
		
	
		static function load($name){
			require("$name.php");
			return new $name;
		}  
		
		
		
	}
?>	