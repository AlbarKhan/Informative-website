<?php 
extract($_POST);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'albarkhan60@gmail.com';                     //SMTP username
    $mail->Password   = 'gpnvvczvqodpdyoz';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('albarkhan60@gmail.com', 'Form mail');
    $mail->addAddress($_POST['email'], $name);     //Add a recipient

    //Attachments
    // $mail->addAttachment($_FILES['file']['tmp_name'],$_FILES['file']['name']);         //Add attachments
    // $mail->addAttachment($_FILES['file']['name']);    //Optional name
 
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Form mail';
    $mail->Body    = "<h3>Name: $name <br>
    \r\nPhone: $phone <br>
     \r\nEmail: $email <br>
     \r\nmessage: $message</h3>";

    $mail->send();
    // header("Location: form.html?success='1'&name=sucess");
    exit;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
