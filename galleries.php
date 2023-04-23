<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/gall.css">
    <link rel="stylesheet" href="./styles/header.css">
    <title>Document</title>

</head>

<body>
    <?php
    include  './inc/Navbar.php';
    $sql_query = "SELECT * FROM galleries";
    $query = mysqli_query($conn, $sql_query);
    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
    ?>
    <div class="container">
        <div class="grid-container">
            <?php foreach ($results as $result) : ?>
                <div class="grid-item <?= $result['grid_class'] ?>">
                    <img src="./public/images/galleries/<?= $result['photo_name'] ?>">
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>

</html>