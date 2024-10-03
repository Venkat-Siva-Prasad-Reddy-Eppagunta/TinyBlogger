<?php include("path.php"); 
include(ROOT_PATH . "/app/controllers/users.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b4bccc0b37.js" crossorigin="anonymous"></script>
    <!-- CUstume Styling -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <title>Forgot Password</title>
</head>
<body>
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>

    <div class="auth-content">
        <form action="" method="post">
            <h2 class="form-title">Recover your Password</h2>
            <p>
                Please enter your email address you need to sign up on this site 
                and we will assist you in recovering your password.
            </p>
            <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
            <div>
                <label>Email Address</label>
                <input type="email" name="email" class="text-input">
            </div>
            <div>
                <button type="submit" name="forgotpass" class="btn btn-prim btn-big">Recover My Password</button>
            </div>
        </form>
    </div>
</body>
</html>