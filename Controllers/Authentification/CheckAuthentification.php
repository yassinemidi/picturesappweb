<?php


if(empty($_SESSION)){
    header("location: ../../Views/Authentification/login.php");
}