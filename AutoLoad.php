<?php
require_once 'conf.php';
require 'Plugins/PHPMailer/vendor/autoload.php';
$directories = ["Forms", "Layouts", "Service"];

spl_autoload_register(function ($className) use ($directories) {
    foreach ($directories as $directory) {
        $filePath = __DIR__ . "/$directory/" . $className . '.php';
        if (file_exists($filePath)) {
            require_once $filePath;
            return;
        }
    }
});


$form = new forms();
$layout = new layout();
$senderObj = new mailsender();
$db = new Database($conf);