<?php
    include("conexion.php");
    $validar = 0;

    $Nombre = isset($_POST["Nombre"]) ? $_POST["Nombre"]:"" ;
    $Correo = isset($_POST["Correo"]) ? $_POST["Correo"]:"" ;
    $Clave = isset($_POST["Clave"]) ? $_POST["Clave"]:"" ;

    if($Clave = '' || $Correo = ''){
        echo "El usuario y la clave no pueden ser vacias";
    }else{
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
    
            if($validar == 0){
                $query = "INSERT INTO `Clientes`(`Nombre`, `Correo`, `Clave`) VALUES ('$Nombre','$Correo','$Clave')";
                $resultado = mysqli_query($conexion, $query);
            
                if (!$resultado) {
                    echo "Error al insertar usuario, contacte con el administrador\n\n";
                    die('Consulta no válida: ' . mysqli_error());
                }else{
                    echo "Datos insertados correctamente";
                }
            }
        }
    }
?>