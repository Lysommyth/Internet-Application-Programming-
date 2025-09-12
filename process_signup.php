<?php

require_once 'ClassAutoLoad.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Get form data
    $userEmail = $_POST['email'];
    $userName = $_POST['username'];
    $password = $_POST['password'];
    
    // Hash the password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    
    // Save user directly to database without verification token
    try {
        $stmt = $db->prepare("INSERT INTO users (username, email, password, is_verified) VALUES (?, ?, ?, 1)");
        $stmt->execute([$userName, $userEmail, $passwordHash]);
        
        // Redirect to success page immediately
        header('Location: signup_success.php');
        exit();
        
    } catch (PDOException $e) {
        // Handle database errors
        header('Location: signup_error.php?reason=db_error');
        exit();
    }
    
} else {
    header('Location: index.php');
    exit();
}
?>