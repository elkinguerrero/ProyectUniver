<?php
    include("conexion.php");
    $validar = 0;

    $Nombre = isset($_POST["Nombre"]) ? $_POST["Nombre"]:"" ;
    $Correo = isset($_POST["Correo"]) ? $_POST["Correo"]:"" ;
    $Clave = isset($_POST["Clave"]) ? base64_encode($_POST["Clave"]):"" ;

    if($Clave == '' || $Correo == ''){
        echo "El usuario y la clave no pueden ser vacias";
    }else{
        $query = "SELECT * FROM `Clientes` WHERE `Correo` = '$Correo'";
        $resultado = mysqli_query($conexion, $query);
        if (!$resultado) {
            echo "Error al consultar usuario contacte con el administrador\n\n";
            die('Consulta no válida: ' . mysqli_error());
        }else{
            if(mysqli_num_rows($resultado) == 0){
                $query = "INSERT INTO `Clientes`(`Nombre`, `Correo`, `Clave`) VALUES ('$Nombre','$Correo','$Clave')";
                $resultado = mysqli_query($conexion, $query);
            
                if (!$resultado) {
                    echo "Error al insertar usuario, contacte con el administrador\n\n";
                    die('Consulta no válida: ' . mysqli_error());
                }else{
                    echo "Datos insertados correctamente";
                }
            }else{
                echo "Usuario ya esta registrado en la base de datos";
            }
        }
    }
?>