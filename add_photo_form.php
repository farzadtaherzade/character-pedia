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
            <form action="./modules/add_new_photo.php" method="POST" enctype="multipart/form-data">
                <label for="image">Photo:</label>
                <input type="file" id="image" name="image" />

                <input type="submit" value="Add" />
            </form>
        </div>
    </div>
</body>

</html>