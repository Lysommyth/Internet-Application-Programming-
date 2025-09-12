<?php
//PHPMailer classes 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class sendMail {
    public function send_Mail($conf, $mailCnt) {
        
        $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $conf['smtp_host'];                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $conf['smtp_user'];                     //SMTP username
    $mail->Password   = $conf['smtp_pass'];                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       =    $conf['smtp_port'];                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setfrom($mailCnt['email_from'],$mailCnt['name_from']); // From: ICS C Community <marsh.omoro@...>
     if (!empty($conf['admin_email'])) {
    $mail->addReplyTo($conf['admin_email'], $conf['site_name']);
            }
    $mail->addAddress($mailCnt['email_to'], $mailCnt['name_to']);            //Name is optional
    

    //Content
    $mail->isHTML(true); //email format set to HTML
    $mail->Subject = 'Welcome to ' . $conf['site_name'] . '! Account Verification';
     if (isset($mailCnt['verification_link'])) {
    $mail->Body    = '
                <p>Hello <strong>' . $mailCnt['name_to'] . '</strong>,</p>
                <p>You requested an account on ' . $conf['site_name'] . '.</p>
                <p>In order to use this account you need to <a href="' . $mailCnt['verification_link'] . '">Click Here</a> to complete the registration process.</p>
                <br>
                <p>Regards,<br>Systems Admin<br>' . $conf['site_name'] . '</p>
            ';
    $mail->AltBody = 'Hello ' . $mailCnt['name_to'] . ',
                     You requested an account on ' . $conf['site_name'] . '.
                     In order to use this account you need to visit the following link to complete the registration process:
' . $mailCnt['verification_link'] . '

               Regards,
               Systems Admin
' . $conf['site_name'];
     }else {
        
        $mail->Body    = '
            <p>Hello <strong>' . $mailCnt['name_to'] . '</strong>,</p>
            <p>Welcome to ' . $conf['site_name'] . '!</p>
            <p>Your account has been successfully created and is ready to use.</p>
            <p>You can now login with your username and password.</p>
            <br>
            <p>Regards,<br>Systems Admin<br>' . $conf['site_name'] . '</p>
        ';
        $mail->AltBody = 'Hello ' . $mailCnt['name_to'] . ',
                     Welcome to ' . $conf['site_name'] . '!
                     Your account has been successfully created and is ready to use.
                     You can now login with your username and password.

               Regards,
               Systems Admin
' . $conf['site_name'];
    }

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
 return false;
    }

}
}

