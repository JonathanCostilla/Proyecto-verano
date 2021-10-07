<?php
	class Database{
		private $host	=	"localhost";
		private $user	=	"root";
		private $pass	=	"";
		private $db     =	"manager";
		public  $conexion;
		public function __construct(){
			$this->conexion = new mysqli($this->host,
										 $this->user,
										 $this->pass,
										 $this->db) or die(mysql_error());
			$this->conexion->set_charset("utf8");
		}

		// Function Insertar
		public function insert($table, $dates){
	        $resultado = $this->conexion->query("INSERT INTO $table VALUES (null, $dates)") or die($this->conexion->error);
	        if($resultado){
	            return true;
	        }
	        else{
	        	return false;
	    	}
    	}

		// Function Insertar dist
		public function insertdist($table, $dates){
	        $resultado = $this->conexion->query("INSERT INTO $table (`id_distribucion`, `plan`, `clavemateria`, `materia`, `grupo`, `hora`, `dia`, `salon`, `semestre`) VALUES (null, $dates)") or die($this->conexion->error);
	        if($resultado){
	            return true;
	        }
	        else{
	        	return false;
	    	}
    	}

    	// Function Search
    	public function search($table, $condition){
        	$resultado = $this->conexion->query("SELECT * FROM $table WHERE $condition") or die($this->conexion->error);
        	if($resultado){
	            return $resultado->fetch_all(MYSQLI_ASSOC);
        	}
        	else{
        		return false;
        	}
    	}

		// Function Search_Count
    	public function searchcount($table){
        	$resultado = $this->conexion->query("SELECT count(*) FROM $table") or die($this->conexion->error);
        	if($resultado){
	            return $resultado->fetch_row()[0];
        	}
        	else{
        		return false;
        	}
    	}

    	// Function update
    	public function update($table, $dates, $condition){    
	        $resultado  =   $this->conexion->query("UPDATE $table SET $dates WHERE $condition") or die($this->conexion->error);
	        if($resultado){
	            return true;
	        }
	        else{
	        	return false;        
	    	}
    	}

    	// Function Delete
    	public function delete($table, $condition){    
	        $resultado  =   $this->conexion->query("DELETE FROM $table WHERE $condition") or die($this->conexion->error);
	        if($resultado){
	            return true;
	        }
	        else{
	        	return false;
	    	}
    	}

    	// Fin de public Function  

	}
?>