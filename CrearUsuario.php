<?php
    include("conexion.php");
    $validar = 0;

    $Nombre = $_POST["Nombre"];
    $Correo = $_POST["Correo"];
    $Clave = $_POST["Clave"];

    $query = "SELECT count(*) FROM `Clientes` WHERE `Correo` = ''";
    $resultado = mysqli_query($conexion, $query);
    if (!$resultado) {
        echo "Error al consultar usuario contacte con el administrador\n\n";
        die('Consulta no válida: ' . mysqli_error());
    }else{
        while ($resultado = mysqli_fetch_array($query)){
            $validar = 1;
            echo "Usuario ya existe en la base de datos";
        }
    }
    
    if($validar == 0){
        $query = "INSERT INTO `Clientes`(`Nombre`, `Correo`, `Clave`) VALUES ('$Nombre','$Correo','$Clave')";
        $resultado = mysqli_query($conexion, $query);
    
        /*if (!$resultado) {
            echo "Error al insertar usuario, contacte con el administrador\n\n";
            die('Consulta no válida: ' . mysqli_error());
        }else{
            echo "Datos insertados correctamente";
        }*/
    }
?>