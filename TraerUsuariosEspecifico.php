<?php
    include("conexion.php");

    $idusuario = isset($_POST["idusuario"]) ? $_POST["idusuario"]:"" ;

    if($idusuario == ''){
        echo "Error de servicio, contacte con el administrador";
    }else{
        $query = "SELECT 
                    A.*,
                    (SELECT COUNT(*) FROM `CreditosPrestamistaUsuarios` B WHERE A.Id = B.IdPrestamista) AS 'CantClientes',
                    (SELECT COUNT(*) FROM `RuteroRuta` C WHERE A.Id = C.IdPrestamista) AS 'CantRuteros',
                    (SELECT COUNT(*) FROM `CreditosPrestamistaUsuarios` D
                    INNER JOIN `Creditos` E
                    ON D.IdCredito = E.Id
                    WHERE E.estado = 1
                    AND D.IdPrestamista = A.Id) AS 'CantCreditosActivos',
                    (SELECT COUNT(*) FROM `CreditosPrestamistaUsuarios` D
                    INNER JOIN `Creditos` E
                    ON D.IdCredito = E.Id
                    WHERE E.estado = 2
                    AND D.IdPrestamista = A.Id) AS 'CantCreditosPagados',
                    (SELECT SUM(E.valor) FROM `CreditosPrestamistaUsuarios` D
                    INNER JOIN `Creditos` E
                    ON D.IdCredito = E.Id
                    AND D.IdPrestamista = A.Id) AS 'SumCreditos'
                FROM `Usuarios` A
                WHERE `Id` = '$idusuario'";

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