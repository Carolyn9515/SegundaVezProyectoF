<?php

  public static function getArticulosDescripcion($desc) {
        include("connection_db1.php");
        $query = "SELECT autor from tb_himnos where autor LIKE = "A*" ?";
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

?>