<?php
session_start();
require_once 'AutoLoad.php'; // adjust path depending on your structure


$email = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if (empty($email) || empty($password)) {
    die("Email and password are required.");
}

$db = new database($conf);
$conn = $db->getConnection();

try {
    
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        
        if (password_verify($password, $user['password'])) {
           
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $email;

            
            header("Location: /Internet-Application-Programming-/users.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No account found with that email.";
    }

    $stmt->close();
    $db->close();

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
