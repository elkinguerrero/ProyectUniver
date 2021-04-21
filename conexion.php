<?php
	error_reporting(E_ERROR);
	$conexion = mysqli_connect( "localhost", "ProyectoUniversidad", "Sa7WVRy6A[olhxLH","ProyectoUniversidad");
	if (mysqli_connect_errno($conexion)) {
		echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
	}
	if (!mysqli_set_charset($conexion, "utf8")) {
		printf("Error cargando el conjunto de caracteres utf8: %s\n", mysqli_error($conexion));
	}
	mysqli_set_charset( $conexion, 'utf8');
?>