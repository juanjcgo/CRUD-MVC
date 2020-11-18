<?php
require_once('../helper/autoload.php');
$Session = new UserSession();
$cd = new ProductoDAO();
$buscar = null;

$verificar = $Session->getCurrentUser();

$prod=$cd->listar($verificar);

if(!isset($_SESSION['user']) ){ 
        header('Location:../public/index.php');
}
if(@$_POST['nombre']){
    $nombre = $_POST['nombre'];

    $buscar = $cd->buscar($nombre, $verificar);
}  

?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>
    <LINK REL=StyleSheet HREF="./css/index.css" TYPE="text/css" MEDIA=screen>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-light bg-light">
    <form class="form-inline" method="post" action="./listar.php">
        <input class="form-control mr-sm-2" name="nombre" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
    </form>
    <a class="btn btn-outline-success my-2 my-sm-0" href="../Controlador/Controlador.php?accion=cerrar" type="submit">Cerrar Sesion</a>
    </nav>
    <div class="box-table">
        <h1>Lista de Productos</h1>
        <table class="table table-hover">
                <thead >
                    <tr class="tr-fil-1">
                        <th>ID</th>
                        <th>Imagen</th>
                        <th >Nombre</th>
                        <th >Precio</th>
                        <th >Cate_id</th>
                        <th >Accion</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                if(!isset($buscar)){
                foreach($prod as $d){  
                /* while($d = $prod->fetch_object()): */
                ?>
                <tr class="tr-fil-2">
                    <th><p><?= $d->__get('id')?></p></th>
                    <td><img class="img-prod" src="../Vista/gallery/<?php echo $d->__get('img') ?>"></td>
                    <td><?= $d->__get('nombre')  ?></td>
                    <td><?= $d->__get('precio')  ?></td>
                    <?php 
                        $da = new CategoriaDAO();
                        $cate=$da->list($d->__get('cat_id'));
                    ?>
                    <td><?php echo $cate->__get('nombre') ?></td>
                    <td>
                        <div class="btn-group" role="group" >
                            <a type="button" class="btn btn-secondary"  href="../Controlador/Controlador.php?accion=eliminar&id=<?php echo $d->__get('id')?>">Eliminar</a>
                            <a type="button" class="btn btn-secondary" href="../Controlador/Controlador.php?accion=editar&id=<?php echo $d->__get('id')?>">Editar</a>
                        </div>
                    </td>
                </tr>
                <?php   }}if($buscar != null){ ?>
                    <tr  class="tr-fil-2">
                        <th><?php echo $buscar->__get('id'); ?></th>
                        <th><img class="img-prod" src="../Vista/gallery/<?php echo $buscar->__get('img'); ?>"></th>
                        <th><?php echo $buscar->__get('nombre'); ?></th>
                        <th><?php echo $buscar->__get('precio'); ?></th>
                        <th><?php echo $buscar->__get('cat_id'); ?></th>
                        <td>
                            <div class="btn-group" role="group" >
                                <a type="button" class="btn btn-secondary"  href="../Controlador/Controlador.php?accion=eliminar&id=<?php echo $buscar->__get('id')?>">Eliminar</a>
                                <a type="button" class="btn btn-secondary" href="../Controlador/Controlador.php?accion=editar&id=<?php echo $buscar->__get('id')?>">Editar</a>
                            </div>
                        </td>
                    </tr>
                    <?php   } ?>
                </tbody>
            </table>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a type="button" class="btn btn-success" href="../Controlador/Controlador.php?accion=agregar">Agregar  Producto</a>
                <!-- <a type="button" class="btn btn-warning" href="../Controlador/Controlador.php?accion=add">Agregar Categoria</a> -->
            </div>
            <?php
                if($res = @$_GET['res']){
                   echo '<div class="res">';
                        echo '<h5>'.$res.'</h5>';
                   echo '</div>';
                }
            ?>
            
    </div>
</body>
</html>