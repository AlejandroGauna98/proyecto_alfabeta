<?php

require 'config.php';
require 'ventas.php';

$datos = $_REQUEST;
$data = new Ventas($dbc);

switch($datos['back']){
    case 'extraerDetalle':
        $res = $data->extraerDetalle($datos['id']);
        break;
    case 'extraerCabecera':
        $res = $data->extraerCabecera();
        break;
}

echo json_encode($res);