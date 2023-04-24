<?php
session_start();

if (!empty($_SESSION['user'])) {
    $_SESSION['user'] = '';
    session_destroy();
    header('Location: ../login.php');
    echo 'logout';
} else {
    header('Location: ../login.php');
}
/>
