<?php 

	
	//database constants
	define('DB_HOST', 'localhost');
	define('DB_USER', 'mjgl_demosis21a');
	define('DB_PASS', 'megatec2019_');
	define('DB_NAME', 'mjgl_democrudsis21a');
	
	//connecting to database and getting the connection object
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	
	//Checking if any error occured while connecting
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
	}

	//include("connection_db.php");
	//$conn=conexion();  
	
	//creating a query
	$stmt = $conn->prepare("SELECT codigo, descripcion, precio, imagen FROM tb_articulos;");
	
	//executing the query 
	$stmt->execute();
	
	//binding results to the query 
	$stmt->bind_result($codigo, $descripcion, $precio, $imagen);
	
	$products = array(); 
	
	//traversing through all the result 
	while($stmt->fetch()){
		$temp = array();
		$temp['codigo'] = $codigo; 
		$temp['descripcion'] = $descripcion; 
		$temp['precio'] = $precio; 
		$temp['imagen'] = $imagen;
		array_push($products, $temp);
		
			$datos[] = array_map("utf8_encode", $temp);
  	        header('Content-type: application/json; charset=utf-8');
	}
	
	
	
	//$datos = array();

    echo json_encode($datos, JSON_UNESCAPED_UNICODE);
	
	
	
	//displaying the result in json format 
	//echo json_encode($products);
	
?>	