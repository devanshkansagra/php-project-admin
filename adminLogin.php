<?php
include('../PHP-Project/php/config.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
session_start();
if (isset($_POST["email"])) {

    $mail = new PHPMailer(true);

    $email = $_POST["email"];
    $password = $_POST["password"];
    $query = "SELECT * FROM admin WHERE Email = '$email' AND Password = '$password'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0) {
        try {

            // setting cookies
            setcookie("AdminEmail", $email, time() + 3600, '/');
            setcookie("AdminPassword", $password, time() + 3600, '/');

            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'lorem.ipsum.sample.email@gmail.com';
            $mail->Password   = 'tetmxtzkfgkwgpsc';
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;
    
            // Recipients
            $mail->setFrom('lorem.ipsum.sample.email@gmail.com', 'PHP-Project');
            $mail->addAddress($_POST["email"]);
            $mail->addReplyTo('lorem.ipsum.sample.email@gmail.com', 'PHP-Project');
    
            $otp = rand(100000, 999999);
            $_SESSION['otpAdmin'] = $otp;
            
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'OTP Generated!';
            $mail->Body = "Your New otp is: $otp";
    
            echo "
                <script>
                    alert('Check your email for otp!');
                    window.location.href='/PHP-Project/php/otpVerify.php';
                </script>
            ";
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } 
    else {
        echo "
            <script>
                alert('Invalid Credentials!');
                window.location.href='/PHP-Project/php/adminLoginForm.php';
            </script>
        ";
    }
}
