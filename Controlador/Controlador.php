<?php
/* https://github.com/marcosrivasr/Curso-PHP-MySQL/blob/master/36.%20sesiones/terminado/includes/user.php */
require_once('../helper/autoload.php');
/* echo 'controlador -- | '.$_POST['accion']; */
     $Session = new UserSession();
     $user = new UsuarioDAO();
     /* echo 'entra al controlador';
     die(); */

     if(isset($_POST['usuario']) && isset($_POST['contras'])){
          $usuario = $_POST['usuario'];
          $contras = $_POST['contras'];
          if(isset($_SESSION['user'])){ 
               $s = $Session->getCurrentUser();
               header('Location:../Vista/listar.php');
          }   
          else if($user->list($usuario, $contras)){
               $user = new UsuarioDAO();
               $Session->setCurrentUser($usuario);
               $s = $Session->getCurrentUser();
               header('Location:../Vista/listar.php');
          }else{
               $errorLogin = "Nombre de usuario y/o password incorrecto";
               header('Location:../public/index.php?err='.$errorLogin);
          }
     }
     if(@$_GET['accion'] == 'cerrar'){
          $Session->cerrarSesion();
          header('Location:../public/index.php');
     }



     if(isset($_SESSION['user'])){
          
          if(@$_POST['accion'] == 'Insertar'){
               $nombreArchivo= $_FILES['img']['name'];
               $temporal= $_FILES['img']['tmp_name'];

               /* echo $nombreArchivo;
               echo $temporal;
               die(); */
     
               $dao = new ProductoDAO();
               $img = $dao->guardarImg($nombreArchivo, $temporal);
     
               if($img){
                    $id = $_POST['id'];
                    $nombre = $_POST['nombre'];
                    $precio = $_POST['precio'];
                    $cat_id = $_POST['cat_id'];
                    $user = $_POST['user'];
                    
                    $p = new Producto();
     
                    $p->__set('id', $id);
                    $p->__set('nombre', $nombre);
                    $p->__set('precio', $precio);
                    $p->__set('cat_id', $cat_id);
                    $p->__set('user', $user);
                    $p->__set('img', $nombreArchivo);
     
                    $dao = new ProductoDAO();
                    $res = $dao->agregar($p);
                    header('Location:../Vista/listar.php');
               }else{
                    $err = 'Error al guardar la imagen';
                    header('Location:../Vista/actualizar.php?id='.$id.'&&'.$err);
               }                    
          }
          if(@$_POST['accion'] == 'Actualizar'){
               $p = new Producto();
               $dao = new ProductoDAO();
                    $nombreArchivo= $_FILES['img']['name'];
                    $temporal= $_FILES['img']['tmp_name'];
                    $cod = $_POST['cod'];
                    $id = $_POST['id'];
                    $nombre = $_POST['nombre'];
                    $precio = $_POST['precio'];
                    $cat_id = $_POST['cat_id'];

               if($nombreArchivo != null){
                    /* echo 'si tre nombre';
                    die(); */
                         $img = $dao->guardarImg($nombreArchivo, $temporal);

                    if($img == true){
                       
                         $p->__set('id', $id);
                         $p->__set('nombre', $nombre);
                         $p->__set('precio', $precio);
                         $p->__set('cat_id', $cat_id);
                         $p->__set('img', $nombreArchivo);
                         
                         $res = $dao->actualizar($p , $cod);
                         header('Location:../Vista/listar.php');
                    }else{
                         $err = 'Error al guardar la imagen';
                         header('Location:../Vista/actualizar.php?id='.$id.'&&'.$err);
                    }
               }else{
                    echo 'No tre nombre';
                    $img = $dao->obtenerNombreImg($id);
                    /* var_dump($img->__get('img'));
                    die(); */
                    if($img){
                         $p->__set('id', $id);
                         $p->__set('nombre', $nombre);
                         $p->__set('precio', $precio);
                         $p->__set('cat_id', $cat_id);
                         $p->__set('img', $img->__get('img'));

                         $res = $dao->actualizar($p , $cod);
                         header('Location:../Vista/listar.php');
                    }
               }
          }


          switch(@$_GET['accion']){
               case 'Listar':
                    header('Location:../Vista/listar.php');
               break;
               case 'agregar':
                    header('Location:../Vista/agregar.php');
               break;
               case 'atras':
                    header('Location:../Vista/listar.php');
               break;
               case 'editar':
                    $id = $_GET['id'];
                    header('Location:../Vista/actualizar.php?id='.$id);
               break;
               case 'Actualizar':
                         $cod = $_GET['cod'];
                         $id = $_GET['id'];
                         $nombre = $_GET['nombre'];
                         $precio = $_GET['precio'];
                         $cat_id = $_GET['cat_id'];
                         
                         $p = new Producto();

                         $p->__set('id', $id);
                         $p->__set('nombre', $nombre);
                         $p->__set('precio', $precio);
                         $p->__set('cat_id', $cat_id);

                         $dao = new ProductoDAO();
                         $res = $dao->actualizar($p , $cod);
                         header('Location:../Vista/listar.php');
               break;
               case 'eliminar':
                    $id = $_GET['id'];
                    $dao = new ProductoDAO();
                    $res = $dao->eliminar($id);
                    header('Location:../Vista/listar.php');
               break;
               }
          }else{
               header('Location:../public/index.php');
          }
?>
