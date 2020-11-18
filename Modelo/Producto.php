<?php
class Producto{
    protected $id;
    protected $nombre;
    protected $precio;
	protected $cat_id;
	protected $user;
	protected $img;


	public function __construct( ){

	}

    /* public function __construct( $param ){
		$this->id = $param['id'];
		$this->nombre = $param['nombre'];
		$this->precio = $param['precio'];
		$this->cat_id = $param['cat_id'];
	} */
	
	public function __get( $attr ){
		return $this->$attr; 
	}
	
	public function __set( $attr, $value ){
		$this->$attr = $value; 
	}

}


?>