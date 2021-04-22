<?php
    include("conexion.php");
    $validar = 0;

    $Correo = isset($_POST["Correo"]) ? $_POST["Correo"]:"" ;
    $Clave = isset($_POST["Clave"]) ? base64_encode($_POST["Clave"]):"" ;

    if($Clave == '' || $Correo == ''){
        echo "El usuario y la clave no pueden ser vacias";
    }else{
        $query = "SELECT * FROM `Usuarios` WHERE `Correo` = '$Correo'";
        $resultado = mysqli_query($conexion, $query);
        if (!$resultado) {
            echo "Error al consultar usuario contacte con el administrador\n\n";
            die('Consulta no válida: ' . $query);
        }else{
            if(mysqli_num_rows($resultado) == 0){
                $query = "INSERT INTO `Usuarios`(`Documento`, `Nombres`, `Apellidos`, `Correo`, `Clave`, `Sexo`, `País`, `Dirección`, `Teléfono Fijo`, `Celular`, `Estado`, `Perfli`) VALUES (0,'','','$correo','$clave','',0,'','','',1,'Usuario');";
                $resultado = mysqli_query($conexion, $query);
            
                if (!$resultado) {
                    echo "Error al insertar usuario, contacte con el administrador\n\n";
                    die('Consulta no válida: ' . $query);
                }else{
                    echo "Datos insertados correctamente";
                    //correo
                    include("phpmailer/correo.php");
                    $subject="Creacion de correo ProyectoUniversidad";
                    $body="Usuario creado";
                    //enviar_mensaje([$Correo], $subject, $body);
                    //correo
                }
            }else{
                echo "Usuario ya esta registrado en la base de datos";
            }
        }
    }
?>