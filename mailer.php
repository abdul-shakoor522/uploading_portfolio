<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if(isset($_POST['submit'])){

    // code...
    $full_name=$_POST['full_name'];
    $email=$_POST['email'];
    $message=$_POST['message'];
    
    
    
$mail = new PHPMailer(true);

try {

    $temp = "Name: " . $full_name."<br>Email: " . $email."<br>Meaage: " . $message;
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'shakoorwebdev@gmail.com';          //SMTP username
    $mail->Password   = 'pqtmrdqcfgusnnes';                     //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

    //Recipients
    $mail->setFrom('shakoorwebdev@gmail.com');
    $mail->addAddress('shakoorwebdev@gmail.com');   						   //Add a recipient

    $mail->isHTML(true);                               	   //Set email format to HTML
    $mail->Subject = 'Client Message';
    $mail->Body    = $temp; //
    $mail->AltBody = 'Client Message';

    $mail->send();
    echo "<script>alert('Message Successfully send ✅')
    window.location.href='index.html'
    </script>";
}
 catch (Exception $e) {
    echo "<script>alert('Message could not be send ⚠')
    window.location.href='index.html'
    </script>";
}
}
?>



