<?php

include 'core/config.php';
require "core/Auth_pdo.php";


$logon = new Auth($dbc, 'panel_audibaires.usuarios');

$frmlogin = "modulos/auth/login.php";

if (isset($_REQUEST['error'])) {
    $frmlogin = "modulos/auth/logine.php";
}

$logon->setLoginForm(file_get_contents($frmlogin));
$logon->start();

include 'core/routes.php';

date_default_timezone_set('America/Argentina/Buenos_Aires');

$paramUrl = $_REQUEST;
$p = (isset($paramUrl['p']) ? $paramUrl['p'] : 'home');
$data_pages = $pages[$p];


?>
