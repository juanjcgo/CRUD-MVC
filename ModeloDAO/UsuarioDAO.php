<?php
require_once('../helper/autoload.php');

class UsuarioDAO implements UsuarioInterface{

    private $con;
    private $nombre;
    private $user;

	function __construct(){
        $o = new Conexion();
        $this->con = $o->__get('con');
	}
	

    public function  listar(){
        try{
            $array = array();

            $sql="SELECT * FROM login"; 
            $usu = $this->con->query($sql);
            
            foreach($usu as $row){  
                $usu = new Usuario();
                $usu->__set('id',$row['id']);
                $usu->__set('nombre',$row['nombre']);
                $usu->__set('usuario',$row['usuario']);
                $usu->__set('contras',$row['contras']);
                $usu->__set('rol',$row['rol']);
                $array[] = $usu;
            }  
           
        }catch(Exception $e){
            echo "Error de conexion: ".$e->getMessage();
        }
        return $array;
    }

    public function  list($usuario, $contras){
        try{
            $u = null;
            $sql="SELECT * FROM usuario WHERE user='".$usuario."' and contras='".$contras."'";
            $usu = $this->con->query($sql);

            if($usu->rowCount()){
                foreach($usu as $row){  
                    $u = new Usuario();
                    $u->__set('nombre',$row['nombre']);
                    $u->__set('rol',$row['rol']);
                }
                return $u;
            }

        }catch(Exception $e){
            echo "Error de conexion: ".$e->getMessage();
        }
        return false;
    }

    public function setUser($usuario){
        try{
               /*  $sql = ('SELECT * FROM usuario WHERE user = :usuario');
                $user = $this->con->query($sql); */

                $sql="SELECT * FROM usuario WHERE user = ".$usuario;
                $user = $this->con->prepare($sql)->execute();

               /*  $sql="SELECT * FROM login"; 
                $usu = $this->con->query($sql); */

                echo '<br> ojjjjjo';
                var_dump($user);
                die();
                foreach($user as $row){  
                    echo 'setuser';
                    var_dump($row['nombre']);
                    die();
                    $this->nombre = $row['nombre'];
                    $this->user = $row['user'];
                }

            /* $sql="SELECT * FROM usuario WHERE user=".$usuario;
            $usu = $this->con->query($sql); 
            foreach($usu as $currentUser) {
                $nombre = $currentUser['nombre'];
                $user = $currentUser['user'];
            } */

        }catch(Exception $e){
            echo "Error de conexion: ".$e->getMessage();
        }
    }
    
    public function getNombre(){
        return $this->nombre;
    }
}



