<?php
    include("conexion.php");
    $validar = 0;

    $ID = isset($_POST["ID"]) ? $_POST["ID"]:"" ;

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
                echo json_decode(mysqli_fetch_assoc($resultado));
                echo "Error contraseña o usuario incorrecto";
            }
        }
    }
?>