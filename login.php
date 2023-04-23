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
            <form action="./modules/do_login.php" method="POST">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" />

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" />

                <input type="submit" value="Login" />
                <a href="./register.php">Register</a>
            </form>
        </div>
    </div>
</body>

</html>