<?php
    include("conexion.php");

    $Nombre = $_GET["Nombre"];
    $Correo = $_GET["Correo"];
    $Clave = $_GET["Clave"];

    $query = "INSERT INTO `Clientes`(`Nombre`, `Correo`, `Clave`) VALUES ('$Nombre','$Correo','$Clave')";
    mysqli_fetch_array($conexion, $query);
    /*while ($resultado = mysqli_fetch_array($query)){
        echo json_decode($resultado);
    {*/

    echo $query;
?>