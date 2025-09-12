<?php
require_once 'ClassAutoLoad.php';

try {
    $stmt = $db->prepare("SELECT username FROM users ORDER BY username ASC");
    $stmt->execute();
    $users = $stmt->fetchAll();

    echo "<h2>Registered Users</h2>";

    if ($users) {
        echo "<ol>";
        foreach ($users as $user) {
            echo "<li>" . htmlspecialchars($user['username']) . "</li>";
        }
        echo "</ol>";
    } else {
        echo "<p>No users registered yet.</p>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
