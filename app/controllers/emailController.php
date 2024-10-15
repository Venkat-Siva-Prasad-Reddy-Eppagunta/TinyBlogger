<?php
include(ROOT_PATH . "/vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include(ROOT_PATH . "/vendor/PHPMailer/PHPMailer/src/Exception.php");
include(ROOT_PATH . "/vendor/PHPMailer/PHPMailer/src/PHPMailer.php");
include(ROOT_PATH . "/vendor/PHPMailer/PHPMailer/src/SMTP.php");


// Create the Transport

$phpmailer = new PHPMailer(true);
$phpmailer->isSMTP();
$phpmailer->Host = 'smtp.gmail.com';
$phpmailer->SMTPAuth = true;
$phpmailer->Username = "Your Email";
$phpmailer->Password = "Your Password";
$phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$phpmailer->Port = 465;

// Create the Mailer using your created Transport
$phpmailer->setFrom('TinyBlogger@gmail.com', 'Tiny Blogger');

function PasswordResetLink($userEmail, $token)
{
    // Create a message
    global $phpmailer;
    $body ='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recover Your Password</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }
            .wrapper {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #ffffff;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            .wrapper p {
                font-size: 16px;
                line-height: 1.6;
                margin-bottom: 20px;
            }
            .wrapper a {
                display: inline-block;
                background-color: #007bff;
                color: #ffffff;
                text-decoration: none;
                padding: 10px 20px;
                border-radius: 5px;
                transition: background-color 0.3s ease;
            }
            .wrapper a:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <p>
                Hey,<br>
                Please click on the link below 
                to recover your password.
            </p>
            <a href="http://localhost:8080/TinyBlogger/welcome.php?password-token=' . $token .'">
                Recover Your Password
            </a>
            <p>
                Thank you :)
            </p>
        </div>
    </body>
    </html>
    ';

    $phpmailer->addAddress($userEmail);
    $phpmailer->Subject = 'Recover Your Password';
    $phpmailer->isHTML(true);
    $phpmailer->Body = $body;

    // Send the message
    $result = $phpmailer->send();

}

function sendVerification($userEmail, $token)
{
    // Create a message
    global $phpmailer;
    $body ='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Verify Your Email</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }
            .wrapper {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #ffffff;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            .wrapper p {
                font-size: 16px;
                line-height: 1.6;
                margin-bottom: 20px;
            }
            .wrapper a {
                display: inline-block;
                background-color: #007bff;
                color: #ffffff;
                text-decoration: none;
                padding: 10px 20px;
                border-radius: 5px;
                transition: background-color 0.3s ease;
            }
            .wrapper a:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <p>
                Hey,<br>
                Thank you for signing up on our website. Please click on the link below 
                to verify your email.
            </p>
            <a href="http://localhost:8080/TinyBlogger/welcome.php?token=' . $token .'">
                Verify Your Email
            </a>
            <p>
                Thank you :)
            </p>
        </div>
    </body>
    </html>';

    $phpmailer->addAddress($userEmail);
    $phpmailer->Subject = 'Verify Your Email Address';
    $phpmailer->isHTML(true);
    $phpmailer->Body = $body;

    // Send the message
    $result = $phpmailer->send();
}

function VerifyOTP($userEmail, $otp)
{
    // Create a message
    global $phpmailer;
    $body = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OTP Verification</title>
    </head>
    <body>
        <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
            <h2 style="text-align: center; color: #007bff;">OTP Verification</h2>
            <p style="font-size: 16px;">Hello,</p>
            <p style="font-size: 16px;">Your One Time Password (OTP) for Login verification is:</p>
            <p style="font-size: 24px; font-weight: bold; text-align: center; color: #007bff;">' . $otp .'</p>
            <p style="font-size: 16px;">Please use this OTP to verify your login.</p>
            <p style="font-size: 16px;">If you did not request this OTP, please ignore this email.</p>
            <p style="font-size: 16px;">Thank you,</p>
            <p style="font-size: 16px;">Tiny Bloggers</p>
        </div>
    </body>
    </html>';

    $phpmailer->addAddress($userEmail);
    $phpmailer->Subject = 'OTP Verification Login';
    $phpmailer->isHTML(true);
    $phpmailer->Body = $body;

    // Send the message
    $result = $phpmailer->send();

}
