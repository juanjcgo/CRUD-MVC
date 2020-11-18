<?php
require_once('../helper/autoload.php');

class ProductoDAO implements ProductoInterface{

    private $con;

	function __construct(){
        $o = new Conexion();
        $this->con = $o->__get('con');
	}

    public function listar($user){
        /* echo $user;
        die(); */
        try{
            $array = array();
            
            $sql="SELECT * FROM producto WHERE LOWER(user) LIKE LOWER('%{$user}%')";
            $prod = $this->con->query($sql);
            /* var_dump($prod);
            echo '<h1>';
            print_r($prod);
            die(); */
            

            foreach($prod as $row){  
                $pro = new Producto();
                $pro->__set('id',$row['id']);
                $pro->__set('nombre',$row['nombre']);
                $pro->__set('precio',$row['precio']);
                $pro->__set('cat_id',$row['cat_id']);
                $pro->__set('user',$row['user']);
                $pro->__set('img',$row['img']);
                $array[] = $pro;
                /* array_push($datos, $pro);*/
            }
        }catch(Exception $e){
            echo "Error de conexion: ".$e->getMessage();
        }

            /* echo 'trae';
            var_dump($array);
            echo '<h1>';
            print_r($prod);
            die(); */
        return $array; 
    }
 
    public function  list($id){
        try{
            $pro = 0;
            $sql="SELECT * FROM producto WHERE id =".$id;
            $pro = $this->con->query($sql);

            foreach($pro as $row){  
                $pro = new Categoria();
                /* var_dump($row['id']);
                die(); */
                $pro->__set('id',$row['id']);
                $pro->__set('nombre',$row['nombre']);
                $pro->__set('precio',$row['precio']);
                $pro->__set('cat_id',$row['cat_id']);
                $pro->__set('img',$row['img']);
            }

        }catch(Exception $e){
            echo "Error de conexion: ".$e->getMessage();
        }
        return $pro; 
    }

    public function agregar(Producto $pro){
        try{
            $sql="INSERT INTO producto(
                id,
                nombre,
                precio,
                cat_id,
                user,
                img)
                VALUES( 
                    '{$pro->__get('id')}',
                    '{$pro->__get('nombre')}',
                    '{$pro->__get('precio')}',
                    '{$pro->__get('cat_id')}',
                    '{$pro->__get('user')}',
                    '{$pro->__get('img')}')";
                    
            $this->con->prepare($sql)->execute();
        }catch(Exception $e){
            echo "Error de conexion: ".$e->getMessage();
        }
    }    

    public function eliminar(int $id){
        try{
            $sql="DELETE FROM producto WHERE id=".$id;
            $this->con->prepare($sql)->execute();

        }catch(Exception $e){
            echo "Error de conexion: ".$e->getMessage();
        }
        return "Eliminacion exitosa";
    }
    
    public function actualizar(Producto $pro, $cod){
        try{
            $sql = "UPDATE producto SET 
                id='{$pro->__get('id')}', 
                nombre='{$pro->__get('nombre')}',
                precio='{$pro->__get('precio')}',
                cat_id='{$pro->__get('cat_id')}',
                img='{$pro->__get('img')}'";

            $sql.= "WHERE id=".$cod;
            $res = $this->con->prepare($sql)->execute();

        }catch(Exception $e){
            echo "Error de conexion: ".$e->getMessage();
        }
        return "Actualizacion exitosa";
    }

    public function guardarImg($nombreArchivo, $temporal){
        $formatos=array('.jpg','.png','.doc','.xlsx','.PNG','.jpeg');
        $directorio='../Vista/gallery';

       /*  echo $nombreArchivo;
        echo $temporal;
        die(); */
   
   
        $ext=substr($nombreArchivo,strrpos($nombreArchivo, '.'));
        if(in_array($ext, $formatos)){
             /* echo 'Entra en el array';
             die(); */
             if(move_uploaded_file($temporal, "$directorio/$nombreArchivo")){  
                  return  true;
             }else{
                  echo "Ocurrio un error al guardar la imagen.";
                  return false;
             }
        }else{
             echo "No esta permitido este formato";
             return  false;
        }
    }

    public function obtenerNombreImg($id){
        try{
            $sql="SELECT img FROM producto WHERE id=".$id;
            $pro = $this->con->query($sql);

            foreach($pro as $row){
                $pro = new Producto();
                $pro->__set('img',$row['img']);
            }

        }catch(Exception $e){
            echo "Error de conexion: ".$e->getMessage();
        }
        return $pro;
    }

    public function buscar($nombre, $user){
        try{
            $sql="SELECT * FROM producto WHERE LOWER(user) LIKE LOWER('%{$user}%') AND LOWER(nombre) LIKE LOWER('%{$nombre}%')";
            $pro = $this->con->query($sql);

            if($pro->rowCount()){
                foreach($pro as $row){
                    $pro = new Producto();
                    $pro->__set('id',$row['id']);
                    $pro->__set('nombre',$row['nombre']);
                    $pro->__set('precio',$row['precio']);
                    $pro->__set('cat_id',$row['cat_id']);
                    $pro->__set('img',$row['img']);
                }
            }
            else{
                return null;
            }
        }catch(Exception $e){
            echo "Error de conexion: ".$e->getMessage();
        }
        return $pro;
    }



}
?>