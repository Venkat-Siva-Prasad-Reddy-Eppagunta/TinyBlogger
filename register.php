<?php include("path.php");
include(ROOT_PATH . "/app/controllers/users.php"); 
guestsOnly();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CUstume Styling -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <title>Register</title>
</head>
<body>
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>

    <div class="auth-content">
        <form action="register.php" method="post">
            <h2 class="form-title">Register</h2> 
            <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
            <div>
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $username; ?>" class="text-input">
            </div>
            <div>
                <label>Email</label>
                <input type="text" name="email" value="<?php echo $email; ?>" class="text-input">
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" value="<?php echo $password; ?>" class="text-input">
            </div>
            <div>
                <label>Password Conformation</label>
                <input type="password" name="passwordConf" value="<?php echo $passwordConf; ?>" class="text-input">
            </div>
            <div>
                <button type="submit" name="register-btn" class="btn btn-prim btn-big">Register</button>
            </div>
            <p>Already a Member? <a href="<?php echo BASE_URL . '/login.php' ?>">Sign In</a></p>
        </form>
    </div>
    <!--JQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
    <!--Custom Script-->
    <script src="assets/js/scripts.js"></script>
</body>
</html>