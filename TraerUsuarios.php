<?php
    include("conexion.php");

    $perfil = isset($_POST["perfil"]) ? $_POST["perfil"]:"" ;

    if($perfil == ''){
        echo "Error de servicio, contacte con el administrador";
    }else{
        $query = "  SELECT * FROM `Usuarios` WHERE `Perfli` = '$perfil'";

        $resultado = mysqli_query($conexion, $query);
        if (!$resultado) {
            echo "Error al consultar la base de datos contacte con el administrador\n\n";
            die('Consulta no válida: ' . mysqli_error());
        }else{
            if(mysqli_num_rows($resultado) == 0){
                echo "No hay datos para mostrar";
            }else{
                $myArray = array();
                while ($fila = mysqli_fetch_array($resultado)) {
                    $myArray[] = $fila;
                }
                echo json_encode($myArray);
            }
        }
    }
?>