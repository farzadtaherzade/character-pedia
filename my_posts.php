<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/my_posts.css">
    <title>My posts</title>
</head>

<body>
    <?php include './inc/Sidebar.php' ?>
    <?php
    $author_id = $_SESSION['user']['id'];
    $sql_query = "SELECT * FROM characters where author_id='$author_id'";
    $result = mysqli_query($conn, $sql_query);
    $characters = mysqli_fetch_all($result, MYSQLI_ASSOC)
    ?>
    <div class="container">
        <div class="card-grid">
            <?php foreach ($characters as $key) : ?>
                <div class="card">
                    <div class="icon">
                        <a href="./modules/delete.php?id=<?= $key['id'] ?>"><span class="icon-delete"></span></a>
                        <a href="./update_form.php?id=<?= $key['id'] ?>" class="edit-icon">
                            <div class="pencil-horizontal"></div>
                            <div class="pencil-vertical"></div>
                        </a>
                    </div>
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