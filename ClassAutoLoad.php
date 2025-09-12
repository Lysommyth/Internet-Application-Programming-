<?php
require_once 'Database.php';
require_once 'conf.php';

$database = new Database($conf);
$db = $database->connect();


$directories = ["Forms", "Layouts", "Global"];

spl_autoload_register(function ($className) use ($directories) {
    foreach ($directories as $directory) {
        $filePath = __DIR__ . "/$directory/" . $className . '.php';
        if (file_exists($filePath)) {
            require_once $filePath;
            return;
        }
    }
    throw new Exception("Class '$className' not found in: " . implode(', ', $directories));
});

// Initialize core objects
try {
    $ObjsendMail = new sendMail();
    $form = new forms();
    $layout = new layouts();
} catch (Exception $e) {
    die("Error initializing classes: " . $e->getMessage());
}
?>
