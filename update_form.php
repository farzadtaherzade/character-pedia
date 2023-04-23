<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/add_post.css">
    <title>Document</title>
</head>

<body>
    <?php
    include './inc/Sidebar.php';
    $id = $_GET['id'];
    $sql_query = "SELECT * FROM characters where id='$id';";
    $result = mysqli_query($conn, $sql_query);
    ?>
    <div class="container">
        <div class="login-form">
            <?php if (mysqli_num_rows($result)) { ?>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <form action="./modules/update_post.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
                <label for="title">Title:</label>
                <input type="text" value="<?= $row['title'] ?>" id="title" name="title" />

                <label for="source_character">Source Character:</label>
                <input type="text" value="<?= $row['source_character'] ?>" id="source_character"
                    name="source_character" />

                <label for="desc">Description:</label>
                <textarea name="desc" id="desc" cols="30" rows="10"><?= $row['desc'] ?></textarea>

                <label for="birthdate">Birthdate:</label>
                <input type="date" value="<?= $row['birthdate'] ?>" id="birthdate" name="birthdate" />

                <label for="image">Cover:</label>
                <input type="file" id="image" name="image" />

                <input type="submit" value="Add" />
            </form>
            <?php }
            } else { ?>
            <h1>404</h1>
            <?php } ?>
        </div>
    </div>
</body>

</html>