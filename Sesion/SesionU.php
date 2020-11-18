  
<?php

class UserSession{

    public function __construct(){
        session_start();
    }

    public function cerrarSesion(){
        // Sesion iniciada
        session_start();
        // Eliminar todas las variables de sesión
        $_SESSION["id"];
        session_unset();
        // Destruir seseion
        session_destroy();
        // Enviar al index
        header("Location:../acceder.php");
    }



    public function setCurrentUser($user){
        $_SESSION['user'] = $user;
    }

    public function getCurrentUser(){
        return $_SESSION['user'];
    }

    public function closeSession(){
        session_unset();
        session_destroy();
    }
}

?>