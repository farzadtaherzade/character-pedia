<?php
include '../config/db.php';
include './function.php';

if (isset($_SESSION['username'])) {
    header('Location: ../index.php');
}

define('TARGET_DIR', '../public/images/users');


$user = array('username' => '', 'password' => '', "email" => '', 'image' => '');
$errors = [];

if (empty($_POST['username'])) {
    $errors[] = "Username Can't be empty";
} else {
    $user["username"] = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

if (empty($_POST['email'])) {
    $errors[] = "Email Can't be empty";
} else {
    $user["email"] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
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

if (empty($_FILES['image'])) {
    $errors[] = "Image Can't be empty";
} else {
    $image_full_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $extensions = array("jpeg", "jpg", "png");

    $image_name = substr($image_full_name, 0, strpos($image_full_name, "."));
    $image_ext = substr($image_full_name, strpos($image_full_name, ".") + 1, strlen($image_full_name));

    $new_image_name = gen_image_name($image_name, $image_ext);

    if (!in_array($image_ext, $extensions)) {
        $errors[] = "Extension not allowed, please choose a JPEG or PNG file.";
    } else {
        $user["image"] = $new_image_name;
    }
}

if (empty($errors)) {
    print_r($user);
    $sql_query = "INSERT INTO users (username, email, password, profile_image) 
    VALUES ('$user[username]', '$user[email]', '$user[password]', '$user[image]')";
    if (mysqli_query($conn, $sql_query)) {
        move_uploaded_file($image_tmp, TARGET_DIR . $new_image_name);
        echo 'Image Successfully Uploaded';
        echo "Record Successfully Added";

        header('Location: ../login.php');
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