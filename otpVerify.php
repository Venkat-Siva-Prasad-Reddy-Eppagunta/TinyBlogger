<?php include("path.php") ?>
<?php include(ROOT_PATH . "/app/controllers/users.php");

if(isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];
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
    
    <title>OTP Verification</title>
</head>
<body>
<?php include(ROOT_PATH . "/app/includes/welheader.php"); ?>
<?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

<div class="auth-content">
    <form action="otpVerify.php?user_id=<?php echo $userId ?>" method="post">
    <h2 class="form-title">OTP Verification</h2>
    <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
        <div>
            <label>Username:</label>
            <input type="text" name="username" value="<?php echo $userId ?>"  class="text-input" readonly>
        </div>
        <div>
            <label>Enter OTP:</label>
            <input type="text" name="otp" maxlength="6" class="text-input" required>
        </div>
        <div>
            <button type="submit" name="verify-btn" class="btn btn-prim btn-big">Verify OTP</button>
        </div>
        <p>Generate New OTP by Login again --> <a href="<?php echo BASE_URL . '/login.php' ?>">Sign In</a></p>
    </form>
</div>
    
    <!--JQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
    <!--Custom Script-->
    <script src="assets/js/scripts.js"></script>
</body>
</html>