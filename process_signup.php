<?php

require_once 'AutoLoad.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Get form data
    $userEmail = $_POST['email'];
    $userName = $_POST['username'];
    $password = $_POST['password'];
    
    // Hash the password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    
    // Save user directly to database without verification token
    $conn = $db->getConnection();
    try {
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$userName, $userEmail, $passwordHash]);
        
        // Redirect to success page immediately
        //header('Location: signup_success.php');
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