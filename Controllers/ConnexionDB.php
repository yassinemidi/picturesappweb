<?php
include "valeurs.php";

try{
    $db = new PDO("mysql:host=$bd_machine;dbname=$bd_base;charset=utf8",$bd_login,$bd_password,array(
        PDO::MYSQL_ATTR_SSL_CA => 'DigiCertGlobalRootCA.crt.pem',
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
        ));
}catch(Exception $e){
    die('msg :: '.$e->getMessage());
}

?>