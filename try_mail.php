<?php require_once'ClassAutoload.php';

$mailCnt=[
    'name_from'=>'ICS C Community',
    'email_from'=>'no-reply@icsccommunity.com',
    'name_to'=>'Marsh Omoro',
    'email_to'=>'marshmichael454@gmail.com',
    'subject'=>'Welcome to ICS C Community',
    'body'=>'This is a welcome email from ICS C Community. We are glad to have you on board.'

];
$ObjsendMail->send_Mail($conf , $mailCnt); 

