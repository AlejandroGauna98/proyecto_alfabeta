<?php


$logon->logout();
session_write_close();
header("Location: index.php");


?>