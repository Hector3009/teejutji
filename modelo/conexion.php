<?php
class conexion{
    private $conexion;
    private $server="localhost";
    private $user="root";
    private $pass="";
    private $database='sistema';

    function __construct(){
        $this->conexion=@new mysqli($this->server,$this->user,$this->pass,$this->database); 
        if (mysqli_connect_errno())return true;
        return false;
    }
    function cerrar(){
        $this->conexion->close();
    }
    function registrar_usuario($Datos){
        $query="insert into usuarios(nombre,edad,correo,usuario,pass,acceso)values('".$Datos['nombre']."',".$Datos['edad'].",'".$Datos['correo']."','".$Datos['user']."','".$Datos['pass']."',2)";
        if ($this->conexion->query($query)) {
            return true;
        }
        echo 'Eliga otro Usuario el que intenta ingresar ya esta registrad';
        //echo $this->conexion->error;
        return false;
    }
    function iniciar_session($Datos){
        $query_user="select * from usuarios where usuario='".$Datos['user']."' and pass='".$Datos['pass']."'";
        if ($consulta=$this->conexion->query($query_user)) {
            
            $row=$consulta->fetch_array();
            $acces=$row['acceso'];

                if ($acces==1) {
                    session_start();
                    $_SESSION['acceso']=$row['acceso'];
                    $_SESSION['usuario']=$row['usuario'];
                    $_SESSION['correo']=$row['correo'];
                    $_SESSION['nombre']=$row['nombre'];
                    $_SESSION['ide']=$row['id'];
                    echo "index.php";
                    
                }
                if ($acces==2) {
                    session_start();
                    $_SESSION['acceso']=$row['acceso'];
                    $_SESSION['usuario']=$row['usuario'];
                    $_SESSION['correo']=$row['correo'];
                    $_SESSION['nombre']=$row['nombre'];
                    $_SESSION['ide']=$row['id'];
                    echo "index.php";
                }
                if($consulta->num_rows==0)echo 0;
        }
        else 'error';
    }
    function consulta($Datos){
        $query='';
           //se refire a cargar productos de barro
        $query='select * from productos where(categoria='.$Datos['op'].')';
    
        if ($consulta=$this->conexion->query($query)) { 
                
                if ($consulta->num_rows>0) {
                    while ($resultado=$consulta->fetch_array()) {
                        $filas[]=$resultado;
                    }
                    return $filas;
                 }  
                 return null;
            }
            echo $this->conexion->error;
            echo $query;
            return null;
    }
    function agregar_producto($Datos){
        $query='';
        switch ($Datos['op']) {
            case 1:
               $query='insert into productos (nombre,descripcion,precio,cantidad,imagen,categoria,descuento)values
               ("'.$Datos['nombre'].'","'.$Datos['descripcion'].'",'.$Datos['precio'].','.$Datos['cantidad'].',
               "'.$Datos['imagen'].'",'.$Datos['categoria'].','.$Datos['des'].')';
                break;
            
            default:
                # code...
                break;
        }
        if ($this->conexion->query($query)) return true;
        echo $this->conexion->error;
        return false;
    }
    function busca_producto($Datos){
        $query='';
        //se refire a cargar productos de barro
     $query='select * from productos where(
        ( nombre like "%'.$Datos['patron'].'%" or
         descripcion like "%'.$Datos['patron'].'%")and(categoria='.$Datos['categoria'].')
         )';
 
     if ($consulta=$this->conexion->query($query)) { 
             if ($consulta->num_rows>0) {
                while ($resultado=$consulta->fetch_array()) {
                    $filas[]=$resultado;
                }
                return $filas;
             }  
             return null;
         }
         echo $this->conexion->error;
         echo $query;
         return null;
    }
    function actualizar_producto($Datos){
        $query='UPDATE  productos 
        SET nombre="'.$Datos['nombre'].'",
        descripcion="'.$Datos['descripcion'].'",
        precio='.$Datos['precio'].',
        cantidad='.$Datos['cantidad'].',
        categoria='.$Datos['categoria'].',
        descuento='.$Datos['des'].'
        where(id='.$Datos['id'].')';
        if ($this->conexion->query($query)) return true;
        echo $this->conexion->error;
        return false;

    }
    function eliminar_producto($Datos){
        $query='DELETE FROM `productos` WHERE (id ='.$Datos['id'].')';
        if ($this->conexion->query($query)) return true;
        echo $this->conexion->error;
        return false;
    }
    function busca($Datos){
        $query_user='select * from productos where(id="'.$Datos["id"].'")';
        if ($consulta=$this->conexion->query($query_user)) {    
            if ($row=$consulta->fetch_assoc()) {
                return $row;
            }
            return null;
        }
    }
    function rmdir_recursive($dir) {
        
        if ((bool)(count(scandir($dir))>2)) {
            $files = scandir($dir);
            array_shift($files);    // remove '.' from array
            array_shift($files);    // remove '..' from array
           
            foreach ($files as $file) {
                $file = $dir . '/' . $file;
                if (is_dir($file)) {
                    rmdir_recursive($file);
                    rmdir($file);
                } else {
                    unlink($file);
                }
            }
            rmdir($dir);
            return true;
        }
            rmdir($dir);
            return true;

    }
}
?>