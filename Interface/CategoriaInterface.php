<?php
   interface CategoriaInterface{
      /* public function __get( $attr );
      public function __set( $attr, $value ); */
      public function  listar();
      public function  list($id);
      public function agregar(Categoria $pro);
      public function eliminar(Categoria $pro);
      public function actualizar(int $id);

   } 
?> 