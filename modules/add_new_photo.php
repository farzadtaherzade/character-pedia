<?php
include '../config/db.php';
include './function.php';

define('TARGET_DIR', '../public/images/galleries/');
$grids = array('wide', 'tall', 'big', 'null');
session_start();

$photo_name = '';
$photo_author = $_SESSION['user']['id'];
$rand_num = rand(0, count($grids));
$error =  '';

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
        $error = "Extension not allowed, please choose a JPEG or PNG file.";
    } else {
        $photo_name = $new_image_name;
    }
}

if (empty($errors)) {
    $sql_query = "INSERT INTO galleries (photo_name, author_id,grid_class) VALUES ('$photo_name', '$photo_author', '$grids[$rand_num]')";
    if (mysqli_query($conn, $sql_query)) {
        move_uploaded_file($image_tmp, TARGET_DIR . $new_image_name);
        echo 'Image Successfully Uploaded';
        echo "Record Successfully Added";

        header('Location: ../my_posts.php');
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