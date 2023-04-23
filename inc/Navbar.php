<?php include_once './config/db.php' ?>
<?php session_start() ?>
<nav>
    <a href="#" class="logo">Character Pedia</a>

    <ul class="nav-links">
        <li><a href="./index.php">Home</a></li>
        <li><a href="./about.php">About Us</a></li>
        <li><a href="./galleries.php">Galleries</a></li>
        <!-- <li><a href="#">Contact Us</a></li> -->
    </ul>

    <?php if (isset($_SESSION['user'])) : ?>
        <div class="profile-avatar">
            <a href="./dashboard.php">
                <img src="./public/images/<?= $_SESSION['user']['profile_image'] ?>" alt="Avatar">
            </a>
        </div>
    <?php else : ?>
        <div class="auth-buttons">
            <a href="./login.php" class="login-button">Login</a>
            <a href="./register.php" class="register-button">Register</a>
        </div>
    <?php endif; ?>
</nav>