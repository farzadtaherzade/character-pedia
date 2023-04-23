CREATE DATABASE characterpedia;
use characterpedia;
CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(150) NOT NULL,
    profile_image VARCHAR(200) NOT NULL
);
CREATE TABLE characters (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(200) NOT NULL,
    source_character VARCHAR(60) NOT NULL,
    cover VARCHAR(200) NOT NULL,
    `desc` VARCHAR(255) NOT NULL,
    author_id INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    birthdate DATE NOT NULL,
    FOREIGN KEY (author_id) REFERENCES users(id)
);
CREATE TABLE galleries (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    photo_name varchar(70) NOT NULL,
    author_id INT NOT NULL,
    grid_class varchar(10) NULL DEFAULT "tall",
    FOREIGN KEY (author_id) REFERENCES users(id)
)