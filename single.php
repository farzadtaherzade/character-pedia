<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/single.css">
    <link rel="stylesheet" href="./styles/header.css">
</head>

<body>
    <?php include './inc/Navbar.php' ?>
    <?php
    $id = $_GET['id'];
    $sql_query = "select * from characters where id='$id';";
    $result = mysqli_query($conn, $sql_query);

    ?>
    <div class="container">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="header">
            <h1><?= $row['title'] ?></h1>
            <p class="subtitle">By <?= $row['author_id'] ?> | <?= $row['created_at'] ?></p>
        </div>
        <img src="./public/images/<?= $row['cover'] ?>" class="img" alt="Article Image">
        <h4>Origin Charated: <?= $row['source_character'] ?></h4>
        <div class="content">
            <?= $row['desc'] ?>
        </div>
        <?php }
        }
        ?>
    </div>


</body>

</html>