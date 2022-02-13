<?php
include "../includes/header.php"
?>


<div class="container col-md-6 mt-5">
    <?php if(isset($_GET['msg']) && $_GET['msg']=="failed"): ?>
<div class="alert alert-danger text-center mx-auto w-75" role="alert" >
  Login or password is wrong!
</div>

<?php endif ?>

    <form method="post" action="../../Controllers/Authentification/LoginController.php">
        <h1 class="h3 mb-3 font-weight-normal mt-5">Please sign in</h1>
        <div class="form-group">
            <label for="signin-email" class="control-label sr-only">Email</label>
            <input type="email" class="form-control" id="signin-email" placeholder="Email" name="email">
        </div>
        <div class="form-group">
            <label for="signin-password" class="control-label sr-only">Password</label>
            <input type="password" class="form-control" id="signin-password" placeholder="Password" name="password">
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-block mb-1" name="submit">LOGIN</button>
        <div class="bottom">
            <span class="helper-text d-block mb-5"><a href="password-reset.php">Forgot password?</a></span>
            <span>Don't have an account? <a href="register.php">Register</a></span>
        </div>
    </form>
</div>





<?php
include "../includes/footer.php"
?>