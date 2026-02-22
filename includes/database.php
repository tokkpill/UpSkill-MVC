<?php     
    
    $db = mysqli_connect(
    $_ENV['DB_HOST'] ?? '',
    $_ENV['DB_USER'] ?? '',
    $_ENV['DB_PASS'] ?? '',
    $_ENV['DB_NAME'] ?? ''
    );

    if (!$db) {
    echo "No se puedo conectar a MySQL";
    echo "error de depuracion: " . mysqli_connect_errno();
    exit;
    }