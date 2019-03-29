<?php
if (!isset($_SESSION)) {
    session_start();
    $_SESSION['usuario']='adri';
    $_SESSION['idusuario']='adri';
    $_SESSION['acceso']=1;
  }
if (isset($_SESSION['usuario']) && ($_SESSION['usuario']!='') && 
isset($_SESSION['idusuario']) &&($_SESSION['idusuario']!='') && 
$_SESSION['acceso']==1
) {
    require('../includes/header.php');
}
else{
    require('../includes/header.php');
}
?>