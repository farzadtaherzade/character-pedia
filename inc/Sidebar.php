<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: #111;
        color: #fff;
    }

    .lists a {
        width: 100%;
        padding: 6px;
        border-radius: 7px;
        color: #eee;
        text-decoration: none;
        background-color: rgb(55 54 59);
        display: flex;
        align-items: center;
        gap: 5px;
        transition: all 0.3s ease-out;
    }

    .lists a:hover {
        background-color: rgb(33, 48, 72);
        transform: scale(1.05);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
    }

    .lists {
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 10px;
        height: 94%;
    }

    .sidebar {
        top: 0;
        left: 0;
        position: fixed;
        width: 240px;
        height: 100%;
        background-color: #111;
        padding: 20px;
        box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    a img {
        width: 30px;
        height: auto;
    }

    a:last-child {
        background-color: #d31313;
        margin-top: auto;
        flex-shrink: 0;
    }

    .sidebar-header h3 {
        color: #fff;
        font-size: 24px;
        margin-bottom: 30px;
    }
</style>

<?php
include './config/db.php';
session_start();

if (empty($_SESSION['user'])) {
    header('Location: ./login.php');
}

?>

<nav class="sidebar">
    <div class="sidebar-header">
        <h3>Characters Pedia</h3>
    </div>
    <ul class="lists">
        <a href="./index.php">
            <img src="./public/icons/icons8-home-page-64.png" alt="Characters" />
            Home
        </a>
        <a href="./new_post.php">
            <img src="./public/icons/icons8-add-file-64.png" alt="Characters" />
            New Post
        </a>
        <a href="./add_photo_form.php">
            <img src="./public/icons/icons8-layers-64.png" alt="Characters" />
            Add Photo
        </a>
        <a href="./dashboard.php">
            <img src="./public/icons/icons8-control-panel-64.png" alt="Characters" />
            Dashboard
        </a>
        <a href="./my_posts.php">
            <img src="./public/icons/icons8-layers-64.png" alt="Characters" />
            My Posts
        </a>

        <a href="./modules/logout.php" style="cursor: pointer;" id="logout">
            <img src="./public/icons/icons8-close-window-64.png" alt="Characters" />
            LogOut
        </a>
    </ul>
</nav>