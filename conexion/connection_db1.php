<?php
function conexion(){
	$conn = null;
	$host = 'localhost';
	$db = 'proyecto_final';
	$user = 'root';
	$pwd = '';
	
try{
	$conn = new PDO('mysql:host='.$host.'; dbname='.$db,$user,$pwd);
	
	$mitz="America/El_Salvador";
    $tz = (new DateTime('now', new DateTimeZone($mitz)))->format('P');
    $conn->exec("SET time_zone='$tz';");
    
	
}catch(PDOException $e){
	echo "<center><h2 style='color:green'>Error al tratar de conectar a la BD.";
	echo " consulte al soporte Técnico</h2></center>";
	exit();
}
	return $conn;
}

	?>