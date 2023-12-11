<?php
/* class Conexion{
     public static function Conectar(){
         define('servidor','localhost');
         define('nombre_bd','panel_audibaires');
         define('usuario','dbadmin');
         define('password','dbavenger');         
         $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
         
         try{
            $conexion = new PDO("mysql:host=".servidor.";dbname=".nombre_bd, usuario, password, $opciones);             
            return $conexion; 
         }catch (Exception $e){
             die("El error de Conexión es :".$e->getMessage());
         }         
     }
     
 }*/


ini_set('display_errors', 'On');
error_reporting(E_ALL);

try {
    $archivo = '/usr/share/pearapp/val/configs/panel_Ale.ini';
    if (!$ajustes = parse_ini_file($archivo, true)) {
        throw new exception('No se puede abrir el archivo ' . $archivo . '.');
    }
    $controlador = $ajustes["database"]["driver"]; //controlador (MySQL la mayoría de las veces)
    $servidor = $ajustes["database"]["host"]; //servidor como localhost o 127.0.0.1 usar este ultimo cuando el puerto sea diferente
    $puerto = $ajustes["database"]["port"]; //Puerto de la BD
    $basedatos = $ajustes["database"]["schema"]; //nombre de la base de datos

    $dbc = new PDO(
            "mysql:host=$servidor;port=$puerto;dbname=$basedatos", $ajustes['database']['username'], //usuario
            $ajustes['database']['password'], //constrasena
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            , PDO::MYSQL_ATTR_FOUND_ROWS => true
            , PDO::MYSQL_ATTR_LOCAL_INFILE => true)
    );
    
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>