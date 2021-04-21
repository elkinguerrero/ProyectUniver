<?php
    include("conexion.php");
    $validar = 0;

    $Correo = isset($_GET["Correo"]) ? $_GET["Correo"]:"" ;

    if( $Correo == ''){
        echo "Debe colocar un correo";
    }else{
        $query = "SELECT * FROM `Clientes` WHERE `Correo` = '$Correo'";
        $resultado = mysqli_query($conexion, $query);
        if (!$resultado) {
            echo "Error al consultar usuario contacte con el administrador\n\n";
            die('Consulta no válida: ' . mysqli_error());
        }else{
            if(mysqli_num_rows($resultado) != 0){
                $respuesta = mysqli_fetch_assoc($resultado);

                echo "Se ha enviado un correo con sus datos";
                //correo
                include("phpmailer/correo.php");
                $subject="Recuperacion de clave ProyectoUniversidad";
                $body="Su clave es: "+base64_decode($respuesta['Clave']);
                enviar_mensaje([$Correo], $subject, "asdasdas");
                //correo
            }else{
                echo "El correo no esta en nuestra base de datos";
            }
        }
    }
?>