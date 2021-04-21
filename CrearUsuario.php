<?php
    include("conexion.php");

    $Nombre = $_GET["Nombre"];
    $Correo = $_GET["Correo"];
    $Clave = $_GET["Clave"];

    $query = "INSERT INTO `Clientes`(`Nombre`, `Correo`, `Clave`, `FechaCreacion`) VALUES ('$Nombre','$Correo','$Clave','$FechaCreacion')";
    /*while ($resultado = mysqli_fetch_array($query)){
        echo json_decode($resultado);
    {*/

    echo "fin";
?>