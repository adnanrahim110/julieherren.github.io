<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/autoload.php';

if (isset($_POST['add_email'])) {
  $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Create a new PHPMailer instance for the user email
    $mail = new PHPMailer(true);

    try {
      // Server settings
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
      $mail->SMTPAuth = true;
      $mail->Username = 'info@amazonselfpublishingcompany.com'; // Your SMTP username
      $mail->Password = 'lokk euyq srvi ionk'; // Your SMTP password
      $mail->SMTPSecure = 'tls';
      $mail->Port = 587;

      // Recipient settings for user email
      $mail->setFrom('info@amazonselfpublishingcompany.com', 'Amazon Self Publishing Company');
      $mail->addAddress($email);

      // Email content for user
      $mail->isHTML(true);
      $mail->Subject = 'Thank You for Subscribing!';
      $emailTemplate = file_get_contents('email_template.html');
      $mail->Body = $emailTemplate;

      // Check if user email was sent successfully
      if ($mail->send()) {
        echo "Thank you for subscribing! Please check your email for confirmation.";

        // Create a new PHPMailer instance for admin notification email
        $adminMail = new PHPMailer(true);

        // Admin email server settings
        $adminMail->isSMTP();
        $adminMail->Host = 'smtp.gmail.com'; // Same SMTP server
        $adminMail->SMTPAuth = true;
        $adminMail->Username = 'info@amazonselfpublishingcompany.com';
        $adminMail->Password = 'lokk euyq srvi ionk';
        $adminMail->SMTPSecure = 'tls';
        $adminMail->Port = 587;

        // Admin recipient settings
        $adminMail->setFrom('juliherren@gmail.com.com', 'Amazon Self Publishing Company');
        $adminMail->addAddress('adnankaka.786110@gmail.com'); // Admin email address

        // Load admin email template and replace placeholder
        $adminEmailTemplate = file_get_contents('admin_email_template.html');
        $adminEmailTemplate = str_replace('{{email}}', htmlspecialchars($email), $adminEmailTemplate);

        // Email content for admin
        $adminMail->isHTML(true);
        $adminMail->Subject = 'New Newsletter Signup';
        $adminMail->Body = $adminEmailTemplate;

        // Send email to admin
        if ($adminMail->send()) {
          echo " Admin has been notified of the new signup.";
        } else {
          echo " The user was subscribed, but the admin notification could not be sent.";
        }
      } else {
        echo "The subscription email could not be sent. Please try again.";
      }
    } catch (Exception $e) {
      echo "Message could not be sent. Error: {$mail->ErrorInfo}";
    }
  } else {
    echo "Invalid email format.";
  }
}
