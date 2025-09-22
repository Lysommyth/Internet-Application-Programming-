<?php
// Include the AutoLoad Method
require_once 'AutoLoad.php';
$layout->header($conf);
print $hello->today();
$form->login();
$layout->footer($conf);