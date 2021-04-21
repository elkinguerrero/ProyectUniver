<?php
    //phpinfo();
    //return;
    include("conexion.php");

    $Nombre = $_GET["Nombre"];
    $Correo = $_GET["Correo"];
    $Clave = $_GET["Clave"];

    $query = "INSERT INTO `Clientes`(`Nombre`, `Correo`, `Clave2`) VALUES ('$Nombre','$Correo','$Clave')";
    $resultado = mysqli_query($conexion, $query);

    if (!$resultado) {
        die('Consulta no válida: ' . mysqli_error());
    }
    /*while ($resultado = mysqli_fetch_array($query)){
        echo json_decode($resultado);
    {*/

    echo $query;
?>