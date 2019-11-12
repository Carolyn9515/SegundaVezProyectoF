<?php
function conexion (){
    $conn = null;
    $host ='localhost';
    $db ='conexionsql';
    $user ='root';
    $pwd = '';


    try {
        $conn=new PDO('mysql:host='.$host.';dbname='.$db,$user,$pwd,array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES \'UTF8\''));
      // echo "Enhorabuena YA eres un Hacker";
    } catch (PDOException $e) {
        echo "<center><h2 style=color:green>Error al tratar  de conectar .";
        echo "Consulte con Soporte Tecnico </h2></center>";
        exit ();
        
    }
    return $conn;
}
//conexion();
?>