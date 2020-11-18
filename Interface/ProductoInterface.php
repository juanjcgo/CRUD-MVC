<?php
   interface ProductoInterface{
      /* public function __get( $attr );
      public function __set( $attr, $value ); */
      public function  listar($user);
      public function  list($id);
      public function agregar(Producto $pro);
      public function eliminar(int $id);
      public function actualizar(Producto $id, $cod);
      public function guardarImg($nombreArchivo, $temporal);
      public function obtenerNombreImg($id);
      public function buscar($nombre, $user);
   } 
?> 