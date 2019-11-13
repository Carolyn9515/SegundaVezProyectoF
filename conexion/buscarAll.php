<?php

    include("connection_db1.php");

    $query = "SELECT codigo,descripcion,autor,tipo FROM tb_himnos";

        try {
            $link=conexion();    
            $comando = $link->prepare($query);
            // Ejecutar sentencia preparada
            $comando->execute();
            
            $articulos = array(); 
           
           while ($temp = $comando->fetch(PDO::FETCH_ASSOC)) {
                $temp['codigo'];
                $temp['descripcion'];
                $temp['autor'];
		$temp['tipo'];
                
                array_push($articulos, $temp);
		
    			$datos[] = array_map("utf8_encode", $temp);
      	        header('Content-type: application/json; charset=utf-8');
             }
             
             echo json_encode($datos, JSON_UNESCAPED_UNICODE);
           
        
        } catch (PDOException $e) {
            return false;
        }

?>