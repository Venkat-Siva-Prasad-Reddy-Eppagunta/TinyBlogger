<?php include("path.php") ?>
<?php include(ROOT_PATH . "/app/controllers/users.php");
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    verifyUser($token);
}
if (isset($_GET['password-token'])) {
    $passwordToken = $_GET['password-token'];
    resetPassword($passwordToken);
}

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
    
    <title>Welcome</title>
</head>
<body>
<?php include(ROOT_PATH . "/app/includes/welheader.php"); ?>
<?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

    <div class="auth-content">
        <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

        <?php if ($_SESSION['verified']=== 0):?>
            <div class="success">
                You are Loged in
            </div>
            <?php if(isset($_SESSION['id'])): ?>
                <h3>Welcome, <?php echo $_SESSION['username']; ?></h3>
            <?php endif; ?>

        <div class="alert">
            You need to verify your account.<br>
            Sign in to your email account and click on the 
            verification link we just emailed you<br> 
            <br>
            Please Check your Registered Mail ID......!
            <?php endif; ?> 
        </div>     
    </div>
    <?php if ($_SESSION['verified']=== 1):?>
        <?php header('location: ' . BASE_URL . '/'); ?>
    <?php endif; ?>
    
    <!--JQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
    <!--Custom Script-->
    <script src="assets/js/scripts.js"></script>
</body>
</html>