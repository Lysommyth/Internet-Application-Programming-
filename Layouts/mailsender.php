<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class mailsender{

    public function send($conf, $mailCnt){
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
$mail = new PHPMailer(true);

try {
    //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $conf['smtp_host'];                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $conf['smtp_user'];                     //SMTP username
        $mail->Password   = $conf['smtp_pass'];                     //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = $conf['smtp_port'];                                    

    //Recipients
        $mail->setFrom($mailCnt['email_from'], $mailCnt['name_from']);
        $mail->addAddress($email, $name);  

    //Content
    $mail->isHTML(true);                                  
    $mail->Subject = 'Welcome to ICS 2.2! Account Verification';
    $mail->Body    = '<!DOCTYPE html>
        <html>
        <head>
            <title>ICS 2.2 Account Verification</title>
        </head>
        <body>
            <p>Hello Samuel,</p>
            <p>You requested an account on ICS 2.2.</p>
            <p>In order to use this account you need to <a href="#">Click Here</a> to complete the registration process.</p>
            <p>Regards,<br>Systems Admin<br>ICS 2.2</p>
        </body>
        </html>
    ';
    $mail->AltBody = "Hello Samuel,\n\nYou requested an account on ICS 2.2.\n\nIn order to use this account you need to visit the registration link to complete the registration process.\n\nRegards,\nSystems Admin\nICS 2.2";

    $mail->send();
     header("Location: /Internet-Application-Programming-/Forms/login.php");
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
//including the database operation for inserting a user into the db
    require_once 'C:\Apache24\htdocs\IAP_PROJECT\AutoLoad.php';

    $db = new database($conf);
    $conn = $db->getConnection();
    
    try{
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $stmt->bind_param("sss", $name, $email, $hashed_password);
        $stmt->execute();
        $stmt->close();
        $db->close();
        // header("Location: login.php");
        exit();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }}}