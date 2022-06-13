<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

// Enable verbose debug output
//$mail->SMTPDebug = 3;                               

// Set mailer to use SMTP
$mail->isSMTP();

// smtp 伺服器, 支援多台smtp server備援
$mail->Host = 'smtp1.gmail.com';

// Enable SMTP authentication
$mail->SMTPAuth = true;

// SMTP username
$mail->Username = 'user@example.com';

// SMTP password , If you must use the gmail application password
$mail->Password = 'secret';

// Enable TLS encryption, `ssl` also accepted
$mail->SMTPSecure = 'tls';

// TCP port to connect to
$mail->Port = 587;

$mail->setFrom('from@example.com', 'Mailer');

// Add a recipient , name is optional
$mail->addAddress('joe@example.net', 'Joe User');
$mail->addAddress('ellen@example.com');

// Add a recipient , 
$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');

// Add attachments , optional name
$mail->addAttachment('/var/tmp/file.tar.gz');
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');

// Set email format to HTML
$mail->isHTML(true);

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}