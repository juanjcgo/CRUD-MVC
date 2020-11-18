<?php
class Categoria{
    protected $id;
    protected $nombre;

	public function __construct( ){

	}

    /* public function __construct( $param ){
		$this->id = $param['id'];
		$this->nombre = $param['nombre'];
	} */
	
	public function __get( $attr ){
		return $this->$attr; 
	}
	
	public function __set( $attr, $value ){
		$this->$attr = $value; 
	}

}


?>