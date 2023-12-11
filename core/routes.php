<?php

if(!empty($_SESSION)) {
	switch ($_SESSION['auth_data']['rol']) {
		case 1:
			$pages2 = array('home' => array('url' => 'modulos/home.php', 'urljs' => array('modulos/main.js'))
			//RUTAS DE ABM de usuarios
		    ,'crud_usuarios' => array('url' => 'modulos/vistas/crud_usuarios/crud_usuarios.php', 'urljs' => array('modulos/vistas/crud_usuarios/crud.js'))
			//RUTAS DE Detalle de ventas
		    ,'detalle_ventas' => array('url' => 'modulos/vistas/detalle_ventas/detalle_ventas.php', 'urljs' => array('modulos/vistas/detalle_ventas/detalle_ventas.js'))
			);
			break;
		default:
			# code...
			break;
	}
}

foreach ($pages2 as $k => $v) {
    $pages[$k] = $v;
}