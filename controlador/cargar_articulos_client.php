<?php
include('../modelo/conexion.php');
$Datos = array(
    'op' => $_POST['cargar']
  );
    if ($objeto=new conexion()) {
        
        if ($consulta=$objeto->consulta($Datos)) {
            $objeto->cerrar();
            
            require_once('../includes/datos.php');
        }
        else{
           // echo "eror de conexion";
        }
    }


?>