<?php

define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BD','sistemadeventas');

$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

try{
    $pdo = new PDO($servidor, USUARIO, PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //echo "La conexion a BD fue exitosa";
}catch (PDOException $e) {
    //print_r($e);
    echo "La conexion a BD es erronea";

}

$URL = "http://localhost/www.tesisisetmo.com";

date_default_timezone_set("America/Argentina/Jujuy");
$fechaHora = date("Y-m-d H:i:s");

?>

