<?php require_once "modulos/vistas/parte_superior.php"?>

<?php 
                    
    if($data_pages['url']==""){

        $data_pages['url'] = 'modulos/home.php';
        $data_pages['urljs'] = array('modulos/main.js');
        include $data_pages['url'];
    }else{
        include $data_pages['url'];
    }
?>
    
<?php require_once "modulos/vistas/parte_inferior.php"?>