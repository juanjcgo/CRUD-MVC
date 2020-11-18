<?php
    require_once('../helper/autoload.php');
    $Session = new UserSession();
    $verificar = $Session->getCurrentUser();
    if(!isset($_SESSION['user']) ){ 
            header('Location:../public/index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <LINK REL=StyleSheet HREF="./css/agregar.css" TYPE="text/css" MEDIA=screen>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="../Vista/js/agregar.js" type="text/javascript"></script>
    <title>Agregar Producto</title>
</head>
<body>
    <div class="box-form">
        <h3>Agregar Productos</h3>
        <form class="form" action="../Controlador/Controlador.php"  enctype="multipart/form-data" method="post" name="formulario">
            <div class="img">
                <img src="./img/img.jpg">
                <input type="file" name="img" value="" >
                <label id="error_img" class="err"></label>
            </div>    
            <div >
                <label >Id producto</label>
                <input type="number" class="form-control" name="id" value="" placeholder="Id del producto">
                <label id="error_id" class="err"></label>
            </div>
            <div >
                <label >Nombre producto</label>
                <input type="text" class="form-control" name="nombre" value="" placeholder="Nombre del producto">
                <label id="error_nombre" class="err"></label>
            </div>
            <div>
                <label >Precio producto</label>
                <input type="number" class="form-control" name="precio" value="" placeholder="Precio del producto">
                <label id="error_precio" class="err"></label>
            </div>
                    
            <div class="form-row">
                <label for="inputState">Categoria del producto?</label>
                    <select id="inputState" name="cat_id" class="form-control">
                    <option value="">Selecciona una</option>
                        <?php 
                            $cat = new CategoriaDAO();
                            $cats = $cat->listar();
                            var_dump($cats);
                            foreach($cats as $row){?>
                                <option value="<?php echo $row->__get('id');?>"><?php echo $row->__get('nombre');?></option>
                        <?php }?>
                    </select>
                    <label id="error_cate" class="err"></label>
            </div> 
                <br>
                <div class="btn-group" role="group" >
                    <input type="hidden" name="user" value="<?php echo $verificar?>" >
                    <input type="submit"   class="btn btn-success" name="accion" onclick="return validar();" value="Insertar">
                    <a type="button" class="btn btn-warning" href="../Controlador/Controlador.php?accion=atras">Atras</a>
            </div>
        </form>
    </div>
</body>
</html>