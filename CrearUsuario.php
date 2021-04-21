<?php
    include("conexion.php");

    $query = "SELECT * FROM `usuario_cambio_password` WHERE `id_usuario` = '".$_SESSION['ID_USUARIO']."' ORDER BY `fecha_cambio` DESC";
    while ($resultado = mysqli_fetch_array($query)){
        echo json_decode($resultado);
    {

    //klnkjn
    echo "fin";
?>