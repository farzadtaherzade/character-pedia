<?php
define("DB_USER", "root");
define("DB_SERVER", "localhost");
define("DB_PASSWORD", "");
define("DB_NAME", "characterpedia");

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

if (!$conn) {
    die('Error' . mysqli_connect_error());
}