<?php

require 'config.php';
require 'alfabeta.php';

$datos = $_REQUEST;
$data = new alfabeta($dbc);


switch($datos['back']){
    case 'extraerDatos':
        //var_dump($datos);
        $res = $data->extraerDatos();
        break;
    case 'extraerProductos':
        $res = $data->extraerProductos($datos['accion']);
        break;
    case 'agregarUsuario':
        $res = $data->agregarUsuario($datos);
        break;
    case 'extraerRol':
        $res = $data->extraerRol();
        break;
    case 'modificarUsuario':
        $res = $data->modificarUsuario($datos);
        break;
    case 'cambiarEstado':
        $res = $data->cambiarEstado($datos['username']);
        break;
}

echo json_encode($res);