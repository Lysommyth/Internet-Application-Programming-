<?php
session_start();
require_once 'AutoLoad.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: /Internet-Application-Programming-/Forms/login.php");
    exit();
}

try {
    $db = new Database($conf);
    $conn = $db->getConnection();

    $stmt = $conn->prepare("SELECT username, email FROM users ORDER BY username ASC");

    $stmt->execute();
    $result = $stmt->get_result();

    echo "<h2>Registered Users</h2>";

    $users = [];
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }

    $stmt->close();
    $db->close();

} catch (Exception $e) {
    die("Error fetching users: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Users</title>
  <link rel="stylesheet" href="/InternetApplication-Programming/Forms/Styles/users.css">
</head>
<body>
  <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
  <h2>Registered Users</h2>

  <?php if (!empty($users)): ?>
    <ol>
      <?php foreach ($users as $user): ?>
        <li>
          <strong><?php echo htmlspecialchars($user['username']); ?></strong>  
          (<?php echo htmlspecialchars($user['email']); ?>)
          
        </li>
      <?php endforeach; ?>
    </ol>
  <?php else: ?>
    <p>No users found.</p>
  <?php endif; ?>

  
</body>
</html>