<?php 
require_once "global.php";

$conexion = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

mysqli_query( $conexion, 'SET NAMES "'.DB_ENCODE.'"');

//Si tenemos un posible error en la conexión lo mostramos
if (mysqli_connect_errno())


{

	//mardador de errores
	printf("Falló conexión a la base de datos: %s\n",mysqli_connect_error());
	exit();
}
//sino exite ningun error ejecutar --------------
if (!function_exists('ejecutarConsulta'))

{





	//funcion de ejecutarconsulta que va retornar 
	function ejecutarConsulta($sql)
	{
		global $conexion;
		$query = $conexion->query($sql);
		return $query;
	}

//consulta simple retornado

	function ejecutarConsultaSimpleFila($sql)
	{
		//global tiene la conexion con la base de datos 

		global $conexion;

		//conexion es la variable 
		
		//guardando una variable dentro de una 

		$query = $conexion->query($sql);		
		
		$row = $query->fetch_assoc();
		return $row;
	}

	function ejecutarConsulta_retornarID($sql)
	{
		global $conexion;
		$query = $conexion->query($sql);		
		return $conexion->insert_id;			
	}

	function limpiarCadena($str)
	{
		global $conexion;
		$str = mysqli_real_escape_string($conexion,trim($str));
		return htmlspecialchars($str);
	}
}
?>