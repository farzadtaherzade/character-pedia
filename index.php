<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/header.css">
    <link rel="stylesheet" href="./styles/my_posts.css">
</head>

<body>
    <?php include './inc/Navbar.php' ?>

    <?php
    $sql_query = "SELECT * FROM characters";
    $result = mysqli_query($conn, $sql_query);
    $characters = mysqli_fetch_all($result, MYSQLI_ASSOC)
    ?>
    <h1 align-items=center>Characters</h1>
    <div class="container" style="margin-top: 40px;">
        <div class="card-grid">
            <?php foreach ($characters as $key) : ?>
                <div class="card">
                    <div class="card-image">
                        <img src="./public/images/characters/<?= $key['cover'] ?>" alt="John Wick">
                        <a href="./single.php?id=<?= $key['id'] ?>">
                            <div class="overlay"></div>
                        </a>
                    </div>
                    <div class="card-content">
                        <h2><?= $key['title'] ?></h2>
                        <p><?= $key['desc'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>