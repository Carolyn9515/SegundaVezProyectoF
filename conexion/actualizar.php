<?php
include('main_class.php');

if (isset($_POST["codigo"]) && ($_POST["descripcion"]) && ($_POST["tipo"])  && ($_POST["tipo"])){
 	$codigo = $_POST['codigo'];
 	$descripcion = $_POST['descripcion'];
 	$autor = $_POST['autor'];
	$tipo = $_POST['tipo'];

	$resultado = Mantenimiento::actualizar_Articulos($codigo, $descripcion, $autor, $tipo);
	
	if ($resultado==1) {
        header('Content-type: application/json; charset=utf-8');
        $json_string = json_encode(array("estado" => 1,"mensaje" => "Actualizacion aplicada correctamente."));
        echo $json_string;
        
        //$json_string = json_encode(array('estado' => '1','mensaje' => 'Actualizacion aplicada correctamente.'));
        //echo json_encode($json_string, JSON_UNESCAPED_UNICODE);
		
    } else {
        header('Content-type: application/json; charset=utf-8');
        $json_string = json_encode(array("estado" => 2,"mensaje" => "No se ha modificado ningun dato."));
		echo $json_string;
    }
    
    
}

?>