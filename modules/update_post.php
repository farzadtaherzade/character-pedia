<?php
include '../config/db.php';
include './function.php';

$id = $_GET['id'];
$sql_query = "SELECT * FROM characters where id='$id';";
$result = mysqli_query($conn, $sql_query);
$row = mysqli_fetch_assoc($result);

define('TARGET_DIR', '../public/images/characters/');
session_start();
$id = $_GET['id'];
$character = array('title' => '', 'desc' => '', 'image' => '', "author" => $_SESSION['user']['id'], 'birthdate' => '', 'source_character' => '');
$character['image'] = $row['cover'];
$errors = [];

if (empty($_POST['title'])) {
    $errors[] = "Title Can't be empty";
} else {
    $character["title"] = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

if (empty($_POST['source_character'])) {
    $errors[] = "Source Character Can't be empty";
} else {
    $character["source_character"] = filter_input(INPUT_POST, 'source_character', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

if (empty($_POST['desc'])) {
    $errors[] = "Description Can't be empty";
} else {
    $character["desc"] = filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

if (empty($_POST['birthdate'])) {
    $errors[] = "Birthdate Can't be empty";
} else {
    $character["birthdate"] = filter_input(INPUT_POST, 'birthdate');
}


if (empty($_FILES['image'])) {
    $character["image"] = $row['cover'];
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
        $character["image"] = $new_image_name;
    }
}

if (empty($errors)) {
    // $sql_query = "UPDATE characters (title, `desc`, cover, author_id,birthdate, source_character) 
    // VALUES ('$character[title]', '$character[desc]', '$character[image]', '$character[author]', '$character[birthdate]', '$character[source_character]') where id='$id'";
    $sql_query = "UPDATE characters SET title='$character[title]', `desc`='$character[desc]', cover='$character[image]', author_id='$character[author]', birthdate='$character[birthdate]', source_character='$character[source_character]' WHERE id='$id'";
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