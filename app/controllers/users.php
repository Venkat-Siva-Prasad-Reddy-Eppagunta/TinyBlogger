<?php 

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleware.php");
include(ROOT_PATH . "/app/helpers/validateUser.php");
include(ROOT_PATH . "/app/controllers/emailController.php");


$table = 'users';
$admin_users = selectAll($table);

$errors = array();
$id = '';
$username = '';
$admin = '';
$email = '';
$password = '';
$passwordConf = '';
$verified='';
$token='';


function loginUser($user) 
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['message'] = 'You are now logged in';
    $_SESSION['type'] = 'success';
    $_SESSION['verified']=$user['verified'];

    if ($_SESSION['admin']) {
        header('location: ' . BASE_URL . '/admin/dashboard.php');
    } else if ($_SESSION['verified'] === 0){
        $_SESSION['message'] = 'Please Verify your mail before Login';
        $_SESSION['type'] = 'error';
        sendVerification($user['email'], $user['token']);
        header('location: ' . BASE_URL . '/welcome.php');
    }
    else {
        header('location: ' . BASE_URL . '/');
    }
    exit();
}

if (isset($_POST['register-btn']) || isset($_POST['create-admin']) ) {
    $errors = validateUser($_POST);
    

    if (count($errors) === 0) {
        unset($_POST['register-btn'], $_POST['passwordConf'], $_POST['create-admin']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $_POST['verified'] = false;
        $_POST['token'] = bin2hex(random_bytes(50));

        if(isset($_POST['admin'])){
            $_POST['admin'] = 1;
            $_POST['verified']= 1;
            $user_id = create($table, $_POST);
            $_SESSION['message'] = 'Admin user created successfully';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . '/admin/users/index.php');
            exit();
        } else {
            $_POST['admin'] = 0;
            $user_id = create($table, $_POST);
            $user = selectOne($table, ['id' => $user_id]);
            sendVerification($_POST['email'],$_POST['token']);
            loginUser($user);
        }
       
    } else {
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
}

if (isset($_POST['update-user'])) {
    adminOnly();
    $errors = validateUser($_POST);

    if (count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['passwordConf'], $_POST['update-user'], $_POST['id']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;
        $count = update($table, $id, $_POST);
        $_SESSION['message'] = 'Admin user Updated successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/users/index.php');
        exit();
        
    } else {
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
}



if (isset($_GET['id'])) {
    $user = selectOne($table, ['id' => $_GET['id']]);
    $id = $user['id'];
    $username = $user['username'];
    $admin = $user['admin'];
    $email = $user['email'];
}

if (isset($_POST['login-btn'])) {
    $errors = validateLogin($_POST);

    if (count($errors) === 0) {
        $user = selectOne($table, ['username' => $_POST['username']]);

        if ($user && password_verify($_POST['password'], $user['password'])) {
            // Generate OTP
            $otp = generateOTP();
            update($table, $user['id'], ['otp' => $otp]);
            VerifyOTP($user['email'], $otp);
            // Redirect to OTP verification page with user ID
            header('location: ' . BASE_URL . '/otpVerify.php?user_id=' . $user['username']);
            exit;
        } else {
            array_push($errors, 'Wrong credentials');
        }  
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
}

function generateOTP() {
    // Generate a random 6-digit OTP
    return mt_rand(100000, 999999);
}

if(isset($_POST['verify-btn'])){

    if(count($errors) === 0) {
        $user = selectOne($table, ['username' => $_POST['username']]);
        $verifyOTP = ($_POST['otp'] == $user['otp']);
        if($user && $verifyOTP){
            loginUser($user);
        } else {
            array_push($errors, 'Please re-check OTP.');
        } 
    }
}


if (isset($_GET['delete_id'])) {
    adminOnly();
    $count = delete($table, $_GET['delete_id']);
    $_SESSION['message'] = 'Admin user deleted';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/admin/users/index.php');
    exit();
}
function verifyUser($token){
    global $conn;
    $sql ="SELECT * FROM USERS WHERE token='$token'LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        $user = mysqli_fetch_assoc($result);
        $update_query ="UPDATE users SET verified=1 WHERE token='$token'";
        if(mysqli_query($conn, $update_query)){
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['verified'] = 1;
            $_SESSION['message'] = 'Your Email is verified';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . '/');
            exit(); 
        } 
    }
}
if (isset($_POST['forgotpass'])) {
    $email =$_POST['email'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email']= 'Email is NOT valid';
    }
    if(empty($email)){
        $errors['email']= 'Email is Required';
    }
    if (count($errors) == 0) {
        $sql="SELECT * FROM users WHERE email='$email'LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
        $_POST['token']=$user['token'];
        PasswordResetLink($email,$_POST['token']);
        header('location: password_message.php'); 
        exit();
    }

}
if (isset($_POST['reset-password-btn'])){
    $email=$_SESSION['email'];
    $password =$_POST['password'];
    $passwordConf =$_POST['passwordConf'];
    if(empty($password) || empty($passwordConf)){
        $errors['password']= 'Password is Required';
    }

    if($passwordConf !== $password){
        $errors['password']= 'Password Do Not Match ';
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    if (count($errors) == 0) {
        $sql ="UPDATE users SET password='$password' WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if($result) {
            unset($_SESSION['id']);
            unset($_SESSION['username']);
            unset($_SESSION['email']);
            header('location: login.php');
            exit();
        }
    }
}

function resetPassword($token){
    global $conn;
    $sql ="SELECT * FROM USERS WHERE token='$token'LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $user['email'];
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    header('location: ' . BASE_URL . '/reset_password.php');
    exit(0);
}