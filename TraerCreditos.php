<?php
    include("conexion.php");

    $ID = isset($_GET["ID"]) ? $_GET["ID"]:"" ;

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
            echo "Error al consultar usuario contacte con el administrador\n\n";
            die('Consulta no válida: ' . mysqli_error());
        }else{
            if(mysqli_num_rows($resultado) == 0){
                echo "No hay Crediros para mostrar";
            }else{
                echo $query;
                var_dump($resultado);
                var_dump(mysqli_fetch_assoc($resultado));
                var_dump(json_decode(mysqli_fetch_assoc($resultado)));
                echo json_decode(mysqli_fetch_assoc($resultado));
            }
        }
    }
?>