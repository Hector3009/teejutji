<?php
if (!isset($_SESSION)) {
  session_start();
}
if (isset($_SESSION['usuario']) && ($_SESSION['usuario']!='') && 
    isset($_SESSION['idusuario']) &&($_SESSION['idusuario']!='') && 
    $_SESSION['acceso']==1
    ) {
 
?>


<?php
}
?>