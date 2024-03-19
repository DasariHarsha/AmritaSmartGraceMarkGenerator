<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'dasariharsha934@gmail.com';                     //SMTP username
    $mail->Password   = 'tzwlvvejualukdxs';                               //SMTP password
    $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('dasariharsha934@gmail.com', 'Nalla');
    $mail->addAddress('cb.en.u4cse20414@cb.students.amrita.edu', 'Recipient Name');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Test Email';
    $mail->Body    = 'This is a test email sent using PHPMailer.';

    $mail->send();
    echo 'Email has been sent successfully!';
} catch (Exception $e) {
    echo "Email sending failed: {$mail->ErrorInfo}";
}
?>
