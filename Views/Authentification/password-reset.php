<?php
include "../includes/header.php";
?>


<div class="container col-md-6 mt-5">
    <?php if(isset($_GET['msg']) && $_GET['msg']=="failed"): ?>
<div class="alert alert-danger text-center mx-auto w-75" role="alert" >
  Not valid email
</div>

<?php endif ?>

    <form method="post" action="../../Controllers/Authentification/PasswordResetController.php">
        <h1 class="h3 mb-3 font-weight-normal mt-5">Reset password</h1>
        <div class="form-group">
            <label for="email" class="control-label sr-only">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block mb-1" name="password-reset-link">Send password reset link</button>
    </form>
</div>





<?php
include "../includes/footer.php"
?>