<?php 
include '../ConnexionDB.php'; 
session_start();
?>


<?php

if(isset($_POST['submit'])){

    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email = $_POST['email'];
    $password =md5($_POST['password']);
    $about=$_POST['about'];
    $dir="$first_name-$last_name".random_int(0,9999999);
    mkdir("../../uploads/$dir");


    $req = $db->query("SELECT COUNT(*) FROM users WHERE email='$email'");
    $res = $req-> fetchColumn();
    if($res == 1){
        
        header('location: ../../Views/Authentification/register.php?msg=already');
    }else{
        //add informations here
        $image =  $dir.'/'.random_int(0,999999).basename($_FILES['image']['name']);


        $file = $_FILES['image']['tmp_name'];
        $path = '../../uploads/' . $image;
        move_uploaded_file($file,$path);
        $req = $db->prepare("insert into users(email,password,first_name,last_name,about,dir,image) values(?,?,?,?,?,?,?)");
    
    $req->execute([$email,$password,$first_name,$last_name,$about,$dir,$image]);
    header('location: ../../Views/Authentification/login.php');
    }


    
}




?>