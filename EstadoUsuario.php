<?php
    include("conexion.php");

    $idusuario = isset($_POST["idusuario"]) ? $_POST["idusuario"]:"" ;
    $estado = isset($_POST["estado"]) ? $_POST["estado"]:"" ;

    if($idusuario == '' || $estado == ''){
        echo "Error de servicio, contacte con el administrador";
    }else{
        $query = "UPDATE `Usuarios` SET `Estado`='$estado' WHERE `Id` = '$idusuario'";
        $resultado = mysqli_query($conexion, $query);
    }
?>