<?php
require_once('../helper/autoload.php');

class CategoriaDAO implements CategoriaInterface{

    private $con;

	function __construct(){
        $o = new Conexion();
        $this->con = $o->__get('con');
	}
	

    public function listar(){   
        try{
            $array = array();

            $sql="SELECT * FROM categoria";
            $cate = $this->con->query($sql);
            
            foreach($cate as $row){  
                $cat = new Categoria();
                $cat->__set('id',$row['id']);
                $cat->__set('nombre',$row['nombre']);
                $array[] = $cat;
            }  
           
        }catch(Exception $e){
            echo "Error de conexion: ".$e->getMessage();
        }
        return $array;
    }

    public function list($id){
        try{
            $cat = 0;

            $sql="SELECT * FROM categoria WHERE id =".$id;
            $cate = $this->con->query($sql);

            foreach($cate as $row){  
                $cat = new Categoria();
                $cat->__set('id',$row['id']);
                $cat->__set('nombre',$row['nombre']);
            }

        }catch(Exception $e){
            echo "Error de conexion: ".$e->getMessage();
        }
        return $cat; 
    }


    public function agregar(Categoria $pro){}    
    public function eliminar(Categoria $pro){}
    public function actualizar(int $id){}

}
?>