<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'thecreatics.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'developer@thecreatics.com';                     //SMTP username
    $mail->Password   = '&l7LW,H];ZWg';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    // echo $_POST['email']['value'];die;

    //Recipients
    $mail->setFrom('developer@thecreatics.com', 'Mailer');
    $mail->addAddress('kfazil11@gmail.com', 'Joe User');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Reservations Email';
    $message = '<html><body>';
    // $message .= '<img src="//css-tricks.com/examples/WebsiteChangeRequestForm/images/wcrf-header.png" alt="Website Change Request" />';
    $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['name']['value']) . "</td></tr>";
    $message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email']['value']) . "</td></tr>";
    $message .= "<tr><td><strong>Order:</strong> </td><td>" . strip_tags($_POST['order']['value']) . "</td></tr>";
    // $message .= "<tr><td><strong>timing:</strong> </td><td>" . strip_tags($_POST['order']['value']) . "</td></tr>";
    $message .= "<tr><td><strong>guest:</strong> </td><td>" . strip_tags($_POST['guest']['value']) . "</td></tr>";
    $message .= "<tr><td><strong>booking_time:</strong> </td><td>" . strip_tags($_POST['booking_time']['value']) . "</td></tr>";
    $message .= "<tr><td><strong>duration:</strong> </td><td>" . strip_tags($_POST['duration']['value']) . "</td></tr>";
    $message .= "<tr><td><strong>event:</strong> </td><td>" . strip_tags($_POST['event']['value']) . "</td></tr>";
    
    $message .= "</table>";
    $message .= "</body></html>";

    $mail->Body    = $message;
    // //     echo '<pre>';
    // //     print_r($mail);
    // // die;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();

    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
