<?php 
include '../ConnexionDB.php'; 
session_start();
?>


<?php

    if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $req = $db->query("SELECT * FROM users WHERE email='$email' AND password='$password'");
    
    if($res = $req-> fetch()){
        $_SESSION['user_id']=$res['id'];
        $_SESSION['dir']=$res['dir'];
        header('location: ../../Views/User/index.php');
    }else{
        header('location: ../../Views/Authentification/login.php?msg=failed');
    }

}
?>