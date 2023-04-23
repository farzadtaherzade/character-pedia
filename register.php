<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="./styles/header.css">
    <link rel="stylesheet" type="text/css" href="./styles/login.css">
</head>

<body>
    <div class="container">
        <div class="image-container">
            <img src="./public/img.avif" alt="Characters" />
        </div>
        <div class="login-form">
            <form action="./modules/do_register.php" method="POST" enctype="multipart/form-data">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" />

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" />

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" />

                <label for="image">Image:</label>
                <input type="file" id="image" name="image" />

                <input type="submit" value="Register" />
                <a href="./login.php">Login</a>
            </form>
        </div>
    </div>
</body>

</html>