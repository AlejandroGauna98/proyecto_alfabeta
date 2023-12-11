<?php
    class Ventas{
        private $dbc;


        function __construct($dbc) {
            getcwd();
            chdir('..');
            $this->dbc = $dbc;
        }
        
        
        public function extraerDetalle($id){
            $sql = "SELECT venta_detalle.id, cantidad, osdata.alfabeta.nombre, osdata.alfabeta.presenta, osdata.alfabeta.precio, osdata.alfabeta_pami.descr AS pami, osdata.alfabeta_via.descr AS via, osdata.acciofar.descr AS accion 
                    FROM panel_audibaires.venta_detalle 
                    INNER JOIN panel_audibaires.venta_cabecera 
                    ON panel_audibaires.venta_detalle.venta_cabecera_id = panel_audibaires.venta_cabecera.id 
                    INNER JOIN osdata.alfabeta 
                    ON panel_audibaires.venta_detalle.alfabeta_id = osdata.alfabeta.id 
                    INNER JOIN osdata.alfabeta_pami 
                    ON osdata.alfabeta.pami = osdata.alfabeta_pami.id 
                    INNER JOIN osdata.alfabeta_via 
                    ON osdata.alfabeta.id_via = osdata.alfabeta_via.id 
                    INNER JOIN osdata.acciofar 
                    ON osdata.alfabeta.id_acciofar = osdata.acciofar.id
                    WHERE venta_detalle.venta_cabecera_id = '$id' ";
            $query = $this->dbc->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function extraerCabecera(){
            $sql = "SELECT * FROM panel_audibaires.venta_cabecera";
            $query = $this->dbc->prepare($sql);
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }