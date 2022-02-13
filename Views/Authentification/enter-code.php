<?php
include "../includes/header.php";
include "../../Controllers/ConnexionDB.php";
include "../../Models/boite_doutils.php";
if(isset($_POST['submit'])){
    session_start();
$id=$_SESSION['id_reset'];
$user=findUserById($db,$id);
if($_POST['code']==$user['code']){
    
    header("location: NewPassword.php");
}else{
    $_SESSION['id_reset']="";
    unset($_SESSION['id_reset']);
}
}
?>


<div class="container col-md-6 mt-5">
    <?php if(isset($_GET['msg']) && $_GET['msg']=="failed"): ?>
<div class="alert alert-danger text-center mx-auto w-75" role="alert" >
  Not valid Code
</div>

<?php endif ?>

    <form method="post" action="">
        <h1 class="h3 mb-3 font-weight-normal mt-5">Reset password</h1>
        <div class="form-group">
            <label for="code" class="control-label sr-only">Enter Your Code</label>
            <input type="text" class="form-control" id="code" placeholder="code" name="code" required>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block mb-1" name="submit">Validate</button>
    </form>
</div>





<?php
include "../includes/footer.php"
?>