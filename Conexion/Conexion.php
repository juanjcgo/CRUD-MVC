<?php
class Conexion{
    protected $con;


    public function __construct(){
        try{
            $this->con=new PDO("mysql:host=localhost;dbname=empresa","root","");
        }catch(Exception $e){
            echo "Error de conexion: ".$e->getMessage();
        }
    }

/*     public function consultar($sql){
        return $this->con->query($sql);
    }

    public function ejecutar($sql){
        return $this->con->prepare($sql)->execute();
    } */

    public function __get( $attr ){
		return $this->$attr; 
	}
	
	public function __set( $attr, $value ){
		$this->$attr = $value; 
	}


}
?>