<?php
    class alfabeta{
        private $dbc;


        function __construct($dbc) {
            getcwd();
            chdir('..');
            $this->dbc = $dbc;
        }
        
        
        public function extraerDatos(){
            $sql = 'SELECT username,nom_usuario,rol,activo,roles.descripcion 
                    FROM panel_audibaires.usuarios 
                    INNER JOIN panel_audibaires.roles 
                    ON usuarios.rol = roles.id';
            $query = $this->dbc->prepare($sql);
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function extraerProductos($opcion){
            $sql = "";
            switch($opcion){
                case "opcion1":
                    $sql="SELECT alfabeta.nombre,alfabeta.presenta,alfabeta.precio,alfabeta_tipovta.descr 
                            FROM osdata.alfabeta 
                            inner join osdata.alfabeta_tipovta 
                            on alfabeta.id_tipovta = alfabeta_tipovta.id 
                            WHERE id_tipovta = 3 
                            limit 50";
                    break;
                case "opcion2":
                    $sql="SELECT alfabeta.nombre,alfabeta.presenta,alfabeta.precio,monodroga.descr 
                            from osdata.alfabeta 
                            inner join osdata.monodroga 
                            on alfabeta.id_monodroga = monodroga.id 
                            where id_monodroga = 5184 
                            and alfabeta.controlado != 0";
                    break;
                case "opcion3":
                    $sql="SELECT alfabeta.nombre,alfabeta.presenta,alfabeta.precio,monodroga.descr 
                            from osdata.alfabeta 
                            inner join osdata.monodroga 
                            on alfabeta.id_monodroga = monodroga.id 
                            where descr 
                            LIKE '%potasio%'";
                    break;
                case "opcion4":
                    $sql="SELECT alfabeta.nombre,alfabeta.presenta,alfabeta.precio,alfabeta_via.descr 
                            from osdata.alfabeta 
                            inner join osdata.alfabeta_via 
                            on alfabeta.id_via = alfabeta_via.id 
                            where id_via = 30";
                    break;
                case "opcion5":
                    $sql="SELECT alfabeta.nombre,alfabeta.presenta,alfabeta.precio,alfabeta_tipovta.descr 
                            from osdata.alfabeta 
                            inner join osdata.alfabeta_tipovta 
                            on alfabeta.id_tipovta = alfabeta_tipovta.id 
                            where alfabeta.id_tipovta = 3 
                            order by alfabeta.precio 
                            desc limit 10";
                    break;                   
                case "opcion6":
                    $sql="SELECT alfabeta.nombre,alfabeta.presenta,alfabeta.precio,alfabeta_forma.descr 
                            from osdata.alfabeta 
                            inner join osdata.alfabeta_forma 
                            on alfabeta.id_forma = alfabeta_forma.id 
                            where alfabeta.id_forma = 5 
                            limit 50";
                    break;
                case "opcion7":
                    $sql="SELECT alfabeta.nombre,alfabeta.presenta,alfabeta.precio,alfabeta_pami.descr 
                            from osdata.alfabeta 
                            inner join osdata.alfabeta_pami 
                            on alfabeta.pami = alfabeta_pami.id 
                            where alfabeta.pami = 1 
                            limit 100";
                    break;
                case "opcion8":
                    $sql="SELECT alfabeta.nombre,alfabeta.presenta,alfabeta.precio,alfabeta_tipovta.descr 
                            from osdata.alfabeta 
                            inner join osdata.alfabeta_tipovta 
                            on alfabeta.id_tipovta = alfabeta_tipovta.id 
                            where alfabeta.id_tipovta = 1 
                            order by alfabeta.precio 
                            desc limit 100";
                    break;
                case "opcion9":
                    $sql="SELECT alfabeta.nombre,alfabeta.presenta,alfabeta.precio,alfabeta_upotencia.descr 
                            from osdata.alfabeta 
                            inner join osdata.alfabeta_upotencia 
                            on alfabeta.upotencia = alfabeta_upotencia.id 
                            where alfabeta.upotencia = 8 
                            limit 25";
                    break;
                case "opcion10":
                    $sql="(SELECT alfabeta.nombre,alfabeta.presenta,alfabeta.precio,laboratorio.descr 
                            FROM osdata.alfabeta 
                            INNER JOIN osdata.laboratorio 
                            ON alfabeta.id_laboratorio = laboratorio.id 
                            WHERE id_laboratorio = 13 LIMIT 50) 
                            UNION 
                            (SELECT alfabeta.nombre,alfabeta.presenta,alfabeta.precio,laboratorio.descr 
                            FROM osdata.alfabeta 
                            INNER JOIN osdata.laboratorio 
                            ON alfabeta.id_laboratorio = laboratorio.id 
                            WHERE alfabeta.id_laboratorio = 28 LIMIT 50) 
                            UNION 
                            (SELECT alfabeta.nombre,alfabeta.presenta,alfabeta.precio,laboratorio.descr 
                            FROM osdata.alfabeta 
                            INNER JOIN osdata.laboratorio 
                            ON alfabeta.id_laboratorio = laboratorio.id 
                            WHERE alfabeta.id_laboratorio = 476 
                            LIMIT 50)";
                    break;
                case "opcion11":
                    $sql="(SELECT alfabeta.nombre,alfabeta.presenta,alfabeta.precio,laboratorio.descr 
                            FROM osdata.alfabeta 
                            INNER JOIN osdata.laboratorio 
                            ON alfabeta.id_laboratorio = laboratorio.id 
                            WHERE id_laboratorio = 603 
                            ORDER BY alfabeta.precio 
                            DESC LIMIT 50) 
                            UNION 
                            (SELECT alfabeta.nombre,alfabeta.presenta,alfabeta.precio,laboratorio.descr 
                            FROM osdata.alfabeta 
                            INNER JOIN osdata.laboratorio 
                            ON alfabeta.id_laboratorio = laboratorio.id 
                            WHERE alfabeta.id_laboratorio = 599 
                            ORDER BY alfabeta.precio 
                            DESC LIMIT 50) 
                            UNION 
                            (SELECT alfabeta.nombre,alfabeta.presenta,alfabeta.precio,laboratorio.descr 
                            FROM osdata.alfabeta 
                            INNER JOIN osdata.laboratorio 
                            ON alfabeta.id_laboratorio = laboratorio.id 
                            WHERE alfabeta.id_laboratorio = 623 
                            ORDER BY alfabeta.precio 
                            DESC LIMIT 50)";
                    break;
            }            
            $query = $this->dbc->prepare($sql);

            if ( $query->execute()) {               
                return $query->fetchAll(PDO::FETCH_ASSOC);
            } else {
                echo "Error en la consulta: " . $query->errorInfo()[2];
                return null;
            }
        }

        public function agregarUsuario($user){
            $username = $user['username'];
            $pass = md5($user['password']);
            $nomUser = $user['nomUsuario'];
            $rol = $user['rol'];

            $sql = "INSERT INTO usuarios (username,password,nom_usuario,rol,email,handler,activo) 
                    VALUES('$username','$pass','$nomUser','$rol',null,null,1)";
            $query = $this->dbc->prepare($sql);
            $query->execute();
            return true;
        }

        public function extraerRol(){
            $sql = "SELECT * FROM roles";
            $query = $this->dbc->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function modificarUsuario($user){
            $username = $user['username'];
            $nomUser = $user['nomUsuario'];
            $rol = $user['rol'];

            $sql = "UPDATE usuarios SET  nom_usuario = '$nomUser', rol = '$rol' WHERE username = '$username'";
            $query = $this->dbc->prepare($sql);
            $query->execute();
            return true;
        }

        public function cambiarEstado($user){
            $username = $user;
            $sql = "UPDATE usuarios SET activo = if(activo = 1, 0, 1) WHERE username = '$username'";
            $query = $this->dbc->prepare($sql);
            $query->execute();
            return true;
        }
    }
    