<?php
session_start();
include "../includes/header.php";
include "../../Controllers/ConnexionDB.php";
if(isset($_POST['submit']) && isset($_SESSION['id_reset'])){
if($_POST['password']==$_POST['cpassword'])
    $req = $db->prepare("update users set password=? where id = ?");
    $req->execute([md5($_POST['password']),$_SESSION['id_reset']]);
    unset($_SESSION['id_reset']);
    header("location: login.php");
}
?>


<div class="container col-md-6 mt-5">
    <?php if(isset($_GET['msg']) && $_GET['msg']=="failed"): ?>
<div class="alert alert-danger text-center mx-auto w-75" role="alert" >
  Not valid email
</div>

<?php endif ?>

    <form method="post" action="">
        <h1 class="h3 mb-3 font-weight-normal mt-5">Reset password</h1>
        <div class="form-group">
            <label for="password" class="control-label sr-only">New Password</label>
            <input type="password" class="form-control" id="password" placeholder="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="cpassword" class="control-label sr-only">Confirm</label>
            <input type="cpassword" class="form-control" id="cpassword" placeholder="Confirm password" name="cpassword" required>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block mb-1" name="submit">Set Password</button>
    </form>
</div>





<?php
include "../includes/footer.php"
?>