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
    <?php include './inc/Sidebar.php' ?>
    <div class="container">
        <div class="login-form">
            <form action="./modules/add_new_post.php" method="POST" enctype="multipart/form-data">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" />

                <label for="source_character">Source Character:</label>
                <input type="text" id="source_character" name="source_character" />

                <label for="desc">Description:</label>
                <textarea name="desc" id="desc" cols="30" rows="10"></textarea>

                <label for="birthdate">Birthdate:</label>
                <input type="date" id="birthdate" name="birthdate" />

                <label for="image">Cover:</label>
                <input type="file" id="image" name="image" />

                <input type="submit" value="Add" />
            </form>
        </div>
    </div>
</body>

</html>