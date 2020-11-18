<?php
   interface UsuarioInterface{
     public function listar();
     public function list($usuario, $contras);
     public function setUser($usuario);
     public function getNombre();
   } 
?> 