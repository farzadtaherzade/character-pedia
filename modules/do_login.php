<?php
session_start();
include '../config/db.php';
include './function.php';
$user = array('username' => '', 'password' => '');
$errors = [];

if (empty($_POST['username'])) {
    $errors[] = "Username Can't be empty";
} else {
    $user["username"] = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

if (empty($_POST['password'])) {
    $errors[] = "Password Can't be empty";
} else {
    $user["password"] = htmlentities($_POST['password']);
    if (check_password($user["password"], 8)) {
        $errors[] = "Error: Password must contain at least 8 characters, including at least one uppercase letter, one lowercase letter, and one digit. Please try again.";
    } else {
        $user["password"] = hashing_string($user["password"]);
    }
}

if (empty($errors)) {

    $sql_query = "SELECT * FROM users where username='$user[username]' and password='$user[password]';";
    $query = mysqli_query($conn, $sql_query);
    if ($query) {
        $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
        if ($result) {
            print_r("result :" . $result);
            $_SESSION['user'] = $result;
            header('Location: ../index.php');
        } else {
            echo 'Username or password is wrong';
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<hr>
<?php
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error;
    }
}

mysqli_close($conn);
?>