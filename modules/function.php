<?php
function check_password($pass, $length = 8)
{
    if (strlen($pass) < $length) {
        return false;
    }

    $has_upper = $has_lower = $has_digit = false;

    for ($i = 0; $i < strlen($pass); $i++) {
        if (ctype_lower($pass)) {
            $has_upper = true;
        }
        if (ctype_upper($pass)) {
            $has_lower = true;
        }
        if (ctype_digit($pass)) {
            $has_digit = true;
        }
    }

    return $has_upper && $has_lower && $has_digit;
}

function hashing_string($str)
{
    $result = hash('md5', $str);
    return $result;
}

function random_string($length = 8)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $result = '';
    for ($i = 0; $i < $length; $i++) {
        $result .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $result;
}

function gen_image_name($name, $ext)
{
    $string = random_string();
    $result = '';
    $result .= $string . $name . "." . $ext;
    return $result;
}