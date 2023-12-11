<?php

class Auth {

    private $_db; //PDO connection
    private $loginForm;
    private $siginForm;
    private $_authTable;

    function __construct($db, $authTable = null) {
        $this->_db = $db;
        $this->_authTable = is_null($authTable) ? 'auth' : $authTable;
    }

    function start() {
        ob_start();
        if (!isset($_SESSION['logged']) || !$_SESSION['logged']) {
            if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
                if ($this->login($_REQUEST['username'], $_REQUEST['password'])) {
                    //
                } else {
                    $frm = file_get_contents("modulos/auth/logine.php");
                    echo $frm;
                    ob_end_flush();
                    exit();
                }
            } else {
                echo $this->loginForm;
                ob_end_flush();
                exit();
            }
        }
    }

    function setLoginForm($cHtml) {
        $this->loginForm = $cHtml;
    }

    function setSiginForm($cHtml) {
        $this->siginForm = $cHtml;
    }

    function login($username, $password) {
        
        $stmt = $this->_db->prepare('SELECT usuarios.*, roles.descripcion as descripcion_rol  FROM panel_audibaires.usuarios INNER JOIN panel_audibaires.roles ON usuarios.rol = roles.id WHERE username=? AND password=?;'); 

        //$_SESSION['passtext'] = $password;

        $stmt->execute(array($username, md5($password)));

        $_SESSION['logged'] = false;
        $ses = false;

        if ($stmt->rowCount() > 0) {
            $_SESSION['logged'] = true;
             
            $_SESSION['auth_data'] = $stmt->fetch(PDO::FETCH_ASSOC);

            $server_addr = $_SERVER['REMOTE_ADDR'];
            $fecha = date('Y-m-d H:i:s');

            /*$sql = "INSERT INTO db_panel_audibaires.accesos (username, server_addr, fecha) 
                    VALUES ('".$_SESSION['auth_data']['username']."', '".$server_addr."','".$fecha."')";
            $query = $this->_db->prepare($sql);
            $query->execute();  */
            
            $ses = true;
            return true;
               
        } else {
            $_SESSION['logged'] = false;
            $ses = false;
            return false;
        }
        return $ses;
    }

    function logout() {
        session_destroy();
        return;
    }

    function getDb() {
        return $this->_db;
    }

    function getAuthData($columnName) {
        return $_SESSION['auth_data'][$columnName];
    }

}
