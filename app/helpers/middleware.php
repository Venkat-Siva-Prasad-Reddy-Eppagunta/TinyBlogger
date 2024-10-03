<?php

function userOnly($redirect = '/index.php')
{
    if (empty($_SESSION['id'])) {
        $_SESSION['message'] = 'You need to login';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect);
        exit(0);
    }
}

function adminOnly($redirect = '/index.php')
{
    if (empty($_SESSION['id']) || empty($_SESSION['admin'])) {
        $_SESSION['message'] = 'You are not authorized';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect);
        exit(0);
    }
}

function loggedinVerify($redirect = '/logout.php')
{
    if($_SESSION){
        if($_SESSION['id'] && $_SESSION['verified'] === 0) {
            $_SESSION['message'] = 'You are not Verified yet';
            $_SESSION['type'] = 'error';
            header('location:' . BASE_URL . $redirect);
            exit(0);
        }
    }
    
}

function guestsOnly($redirect = '/index.php')
{
    if (empty($_SESSION['id']) === 0) {
        header('location: ' . BASE_URL . $redirect);
        exit(0);
    }
}