<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .header {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            text-align: center;
        }
        .content {
            padding: 20px;
            text-align: center;
        }
        .image-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin-top: 20px;
        }
        .image-container img {
            width: 300px;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }
        .logout {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Welcome, 
            <?php 
            if (isset($_SESSION['email'])) {
                $email = $_SESSION['email'];
                $query = mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
                while ($row = mysqli_fetch_array($query)) {
                    echo $row['firstName'] . ' ' . $row['lastName'];
                }
            }
            ?>
        </h1>
    </div>
    <div class="content">
        <h2>About Trees</h2>
        <p>Trees are vital to our environment. They provide oxygen, improve air quality, conserve water, preserve soil, and support wildlife. Trees are also a source of beauty and inspiration.</p>
        <h3>Here are some beautiful tree images:</h3>
        <div class="image-container">
            <img src="https://source.unsplash.com/300x200/?tree,forest" alt="Tree 1">
            <img src="https://source.unsplash.com/300x200/?nature,tree" alt="Tree 2">
            <img src="https://source.unsplash.com/300x200/?forest,green" alt="Tree 3">
            <img src="https://source.unsplash.com/300x200/?tree,landscape" alt="Tree 4">
        </div>
        <div class="logout">
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>