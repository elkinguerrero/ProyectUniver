<?php
    include("conexion.php");

    $Correo = isset($_POST["Correo"]) ? $_POST["Correo"]:"" ;

    if($Correo == ''){
        echo "Error de servicio, contacte con el administrador";
    }else{
        $query = "  SELECT * FROM Usuarios A 
                    INNER JOIN CreditosPrestamistaUsuarios B
                    ON A.Id = B.IdPrestamista
                    INNER JOIN Creditos C
                    ON C.Id = B.IdCredito
                    WHERE A.`Perfli` = 'Prestamista'
                    AND B.IdCliente = (SELECT C.`Id` FROM `Usuarios` C WHERE C.`Correo` = '$Correo')";
                

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