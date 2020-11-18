<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <LINK REL=StyleSheet HREF="../Vista/css/index-main.css" TYPE="text/css" MEDIA=screen>
    <script src="../Vista/js/index-main.js" type="text/javascript"></script>
    <title>Main</title>
</head>
<body>
  
    <a href="../Controlador/Controlador.php?accion=Listar">Ver Productos<a>

    <form  action="../Controlador/Controlador.php" enctype="multipart/form-data" method="post" name="formulario">
    <?php  if(isset($_GET['err'])){ ?>
        <div class="err">
            <h5 class="err"><?php echo $_GET['err']?></h5>
        </div>
    <?php } ?>
    
        <h3>Iniciar Sesión</h3> 
            <table>
                <tr>
                    <td><h4>Usuario</h4></td>
                    <td>
                        <input type="text" name="usuario" class="field" placeholder="Usuario">
                        <label id="error_usuario" class="err"></label>
                    </td>
                </tr>
                <tr>
                    <td><h4>Contraseña</h4></td>
                    <td>
                        <input type="password" name="contras" class="field" placeholder="Contras">
                        <label id="error_password" class="err"></label>
                    </td>
                </tr>
            </table>
                <input type="submit"  name="accion" onclick="return validar();" value="login">
    </form>

</body>
</html>