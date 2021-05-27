<?php
    include("conexion.php");

    $Correo = isset($_POST["Correo"]) ? $_POST["Correo"]:"" ;
    $Clave = isset($_POST["Clave"]) ? base64_encode($_POST["Clave"]):"" ;

    if($Clave == '' || $Correo == ''){
        echo "El usuario y la clave no pueden ser vacias";
    }else{
        $query = "SELECT * FROM `Usuarios` WHERE `Correo` = '$Correo' AND `Clave` = '$Clave'";
        $resultado = mysqli_query($conexion, $query);
        if (!$resultado) {
            echo "Error al consultar usuario contacte con el administrador\n\n";
            die('Consulta no válida: ' . mysqli_error());
        }else{
            if(mysqli_num_rows($resultado) != 0){
                $myArray = array();
                while ($fila = mysqli_fetch_array($resultado)) {
                    $myArray[] = $fila;
                }
                echo json_encode($myArray);
            }else{
                echo "Error contraseña o usuario incorrecto $query";
            }
        }
    }
?>