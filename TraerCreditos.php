<?php
    include("conexion.php");

    $ID = isset($_POST["Correo"]) ? $_POST["Correo"]:"" ;

    if($ID == ''){
        echo "Error de servicio, contacte con el administrador";
    }else{
        $query = "  SELECT B.* 
                    FROM `CreditosPrestamistaUsuarios` A 
                    INNER JOIN `Creditos` B
                    ON A.IdCredito = B.Id
                    WHERE A.`IdCliente` = '$ID'";

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