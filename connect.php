<?php
$host = 'dpg-cvra8mq4d50c73al7340-a';
$port = '5432';
$dbname = 'php_login_db';
$user = 'php_login_db_user';
$password = 'BMQcKTDZsCp6ycFHsrO2Xm8pcHhLnKtV';

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Connected to PostgreSQL successfully!";
} catch (PDOException $e) {
    echo "❌ Connection failed: " . $e->getMessage();
}
?>
