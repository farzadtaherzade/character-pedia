<?php
session_start();

if (!empty($_SESSION['user'])) {
    $_SESSION['user'] = '';
    header('Location: ../login.php');
    echo 'logout';
} else {
    header('Location: ../login.php');
}

ob_end_flush(); // Send output to client