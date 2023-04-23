<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    h1 {
        font-size: 50px;
        text-align: center;
        margin-top: 60px;
    }

    .user_we {
        border: 1px solid rgb(55 54 59);
        padding: 15px;
        border-radius: 20px;
        transition: 0.4s;
        font-weight: bolder;
    }

    .user_we:hover {
        background-color: rgb(33, 48, 72);
    }
    </style>
</head>

<body>
    <?php include './inc/Sidebar.php' ?>

    <h1>Welcome <span class="user_we"><?= $_SESSION['user']['username'] ?></span> To Our Website</h1>
</body>

</html>