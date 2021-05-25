<?php
    include("conexion.php");

    $idcredito = isset($_POST["idcredito"]) ? $_POST["idcredito"]:"" ;

    if($idcredito == ''){
        echo "Error de servicio, contacte con el administrador";
    }else{
        $query = "  SELECT *,
                    (SELECT ( SUM(D.`Valor`) ) FROM `Pagos` D  WHERE D.`Id` = $idcredito) AS 'Pagado'
                    FROM `CreditosPrestamistaUsuarios` A
                    INNER JOIN `Creditos` B
                    ON B.Id = A.IdCredito
                    INNER JOIN `Usuarios` C
                    ON C.Id = A.IdPrestamista
                    WHERE A.`IdCredito` = $idcredito";
                

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