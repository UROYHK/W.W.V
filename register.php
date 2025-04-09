<?php 

include 'connect.php';

if (isset($_POST['signUp'])) {
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $checkEmail = 'SELECT * FROM php_login_db WHERE email = :email';
    $stmt = $conn->prepare($checkEmail);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "Email Address Already Exists!";
    } else {
        $insertQuery = "INSERT INTO php_login_db (firstName, lastName, email, password)
                VALUES ('Read', 'Write', 'readwrite53@gmail.com', md5('admin123'))";

        $stmt = $conn->prepare($insertQuery);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            header("Location: index.php");
        } else {
            echo "Error inserting data!";
        }
    }
}

if (isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = 'SELECT * FROM php_login_db WHERE email = :email AND password = :password';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        session_start();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['email'] = $row['email'];
        header("Location: homepage.php");
        exit();
    } else {
        echo "Not Found, Incorrect Email or Password";
    }
}
?>
