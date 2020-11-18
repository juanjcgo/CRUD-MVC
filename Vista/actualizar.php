<?php
    require_once('../helper/autoload.php');
    $Session = new UserSession();
    $verificar = $Session->getCurrentUser();
    if(!isset($_SESSION['user']) ){ 
        header('Location:../public/index.php');
    }

    $id = $_GET['id'];  
    $dao = new ProductoDAO();
    $prod = $dao->list($id);   /*  ->fetch() */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <LINK REL=StyleSheet HREF="./css/agregar.css" TYPE="text/css" MEDIA=screen>
    <script src="../Vista/js/agregar.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Actualizar</title>
</head>
<body>
    <div class="box-form">
        <h3>Actualizar Producto</h3>
        <h4><?php echo @$_GET['err']?></h4>
        <form class="form" action="../Controlador/Controlador.php" enctype="multipart/form-data" method="post" name="formulario">
            <input type="hidden" name="cod" value="<?php echo $prod->__get('id'); ?>">
            <div class="img">
                <img  src="./gallery/<?php echo $prod->__get('img') ?>">
                <input type="file" name="img" value="null" >
                <label id="error_img" class="err"></label>
            </div>   
            <div >
                <label for="inputAddress">Id producto</label>
                <input type="number" class="form-control" name="id" value="<?php echo $prod->__get('id'); ?>" >
                <label id="error_id" class="err"></label>
            </div>
            <div>
                <label for="inputAddress">Nombre producto</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $prod->__get('nombre'); ?>" >
                <label id="error_nombre" class="err"></label>
            </div>
            <div>
                <label for="inputAddress">Precio producto</label>
                <input type="number" class="form-control" name="precio" value="<?php echo $prod->__get('precio'); ?>" >
                <label id="error_precio" class="err"></label>
            </div>
                    
            <div class="form-row">
                <label for="inputState">Categoria del producto?</label>
                    <select id="inputState" name="cat_id" class="form-control">
                    <option value=""></option>
                        <?php 
                            $cat = new CategoriaDAO();
                            $cate = $cat->list($prod->__get('cat_id'));
                            $cats = $cat->listar();
                            /* var_dump($cats); */
                            foreach($cats as $row){?>
                                <option value="<?php echo $row->__get('id');?>" <?php if($row->__get('id') == $prod->__get('cat_id')){ echo 'selected';}?>><?php echo $row->__get('nombre');?></option>
                        <?php }?>
                    </select>
                    <label id="error_cate" class="err"></label>
            </div>
                <br>
                <div class="btn-group" role="group" >
                    <input  onclick="return  validar();" type="submit"  class="btn btn-success" name="accion" value="Actualizar">
                    <a type="button" class="btn btn-warning" href="../Controlador/Controlador.php?accion=atras">Atras</a>
            </div>
        </form>
    </div>
</body>
</html>