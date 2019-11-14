<?php
  //require_once("connection_db.php");
class Mantenimiento{
    
    public static function guardar_Articulos($codigo, $descripcion, $autor, $tipo){
        include("connection_db.php");
        $query = "INSERT INTO  tb_himnos (codigo, descripcion, autor, tipo)
                                VALUES (?, ?, ?, ?)";
        try{    
          $link=conexion();    
          $comando = $link->prepare($query);
          $comando->execute(array($codigo, $descripcion, $autor, $tipo));
          $count = $comando->rowCount();
        
          if($count > 0){
              return 1;
          }else{
              return 0;
          }
        } catch (PDOException $e) {
            return -1;
        }                        
    }
    
    
    
    
    public static function eliminar_Articulos($codigo){
      include("connection_db.php");
      $query = "delete from tb_himnos where codigo=?";
      try{
          $link=conexion();
          $comando=$link->prepare($query);
          $comando->execute(array($codigo));
          //return $comando;
          $count = $comando->rowCount(); 
          if($count>0){
              return 1;
          }else{
              return 0;   
          }
          
      }catch (PDOException $e){
          return -1;
      }
  }
  
  
  
  public static function actualizar_Articulos($codigo, $descripcion, $autor, $tipo){
        include("connection_db.php");
        $query = "UPDATE tb_himnos" .
            " SET descripcion=?, autor=?, tipo=? " .
            "WHERE codigo=?";

        try {    
          $link=conexion();    
          $comando = $link->prepare($query);
          $comando->execute(array($descripcion, $autor, $tipo, $codigo));
          //return $comando;
          $count = $comando->rowCount(); 
          if($count>0){
              return 1;
          }else{
              return 0;   
          }

        } catch (PDOException $e) {
            // Aqui puedes clasificar el error dependiendo de la excepcion
            // para presentarlo en la respuesta Json
            return -1;
        }
    }
    
    
    
    
    public static function getArticulosCodigo($codigo) {
        include("connection_db1.php");
        $query = "SELECT codigo,descripcion,autor,tipo from tb_himnos where codigo = ?";
    try {    
          $link=conexion();    
          $comando = $link->prepare($query);
          $comando->execute(array($codigo));
          $row = $comando->fetch(PDO::FETCH_ASSOC);
          return $row;

        } catch (PDOException $e) {
            // Aqui puedes clasificar el error dependiendo de la excepcion
            // para presentarlo en la respuesta Json
            return -1;
        }
  }
  
  
  public static function getArticulosDescripcion($desc) {
        include("connection_db1.php");
        $query = "SELECT codigo,descripcion,autor,tipo from tb_himnos where descripcion LIKE = "A*" ?";
    try {    
          $link=conexion();    
          $comando = $link->prepare($query);
          $comando->execute(array($desc));
          $row = $comando->fetch(PDO::FETCH_ASSOC);
          return $row;

        } catch (PDOException $e) {
            // Aqui puedes clasificar el error dependiendo de la excepcion
            // para presentarlo en la respuesta Json
            return -1;
        }
  }
  
  
  
   public static function getAllArticulos() {
        include("connection_db1.php");
        
        $query = "SELECT codigo,descripcion,autor,tipo FROM tb_himnos";

        try {
            $link=conexion();    
            $comando = $link->prepare($query);
            // Ejecutar sentencia preparada
            $comando->execute();
            
            $rows_array = array();
            while($result = $comando->fetch(PDO::FETCH_ASSOC))
                {
                    //$temp = array();
                    //$temp['codigo'] = $result['codigo'];
                    //$temp['descripcion'] = $result['descripcion'];
                    //$temp['precio'] = $result['precio'];
                                            
                     $array [] = array('codigo' => $result['codigo'], 'descripcion' => $result['descripcion'], 'autor' => $result['autor'], 'tipo' => $result['tipo']);
                    
                    /*
                    $rows_array['codigo'] = $result['codigo'];
                    $rows_array['descripcion'] = $result['descripcion'];
                    $rows_array['autor'] = $result['autor'];
		    $rows_array['tipo'] = $result['tipo'];

                    */
                }
                
                array_map("utf8_encode", $array);
  	            header('Content-type: application/json; charset=utf-8');
  	            return print_r(json_encode($array), JSON_UNESCAPED_UNICODE);
  	            
  	            
  	            //json_encode($datos, JSON_UNESCAPED_UNICODE);
                //return (var_dump($array));
                //return print_r($array);
        } catch (PDOException $e) {
            return false;
        }
        
    }
  
  
  
      //by Prof. Gamez.
}
?>