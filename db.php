<?php
// Update these values to match your local setup (XAMPP/phpMyAdmin)
$db_host = '127.0.0.1';
$db_name = 'foresight_academy';
$db_user = 'root';
$db_pass = 'root';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    // Connect to server (no database) so we can create the database if it doesn't exist
    $pdo = new PDO("mysql:host=$db_host;charset=utf8mb4", $db_user, $db_pass, $options);
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$db_name` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");

    // Reconnect to the newly created (or existing) database
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass, $options);

    // Ensure contacts table exists (safe to run repeatedly)
    $pdo->exec(<<<'SQL'
CREATE TABLE IF NOT EXISTS contacts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(191) NOT NULL,
  email VARCHAR(191) NOT NULL,
  message TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
SQL
    );

        // Ensure subscribers table exists
        $pdo->exec(<<<'SQL'
CREATE TABLE IF NOT EXISTS subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(191) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
SQL
        );

} catch (PDOException $e) {
    // Helpful diagnostic for local development — update credentials in db.php or start MySQL service
    $msg = 'Database error: ' . $e->getMessage() . ' — please check `db.php` credentials, ensure MySQL is running, or import `sql/setup.sql` via phpMyAdmin.';
    die($msg);
}
