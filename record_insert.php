<?php
require_once("./connect_db.php");
require_once './mail/vendor/autoload.php';
session_start();
$full_name = $_POST['full_name'];
$ph_number = $_POST['phone_number'];
$pass = $_POST['password'];
$email = $_POST['email'];
$hash = password_hash($pass,PASSWORD_DEFAULT);
$hemail= password_hash($email,PASSWORD_DEFAULT);
$verify_status = $_POST['verify_status'];
$sql = "Insert into users (user_id,name,ph_number,password,email,verify_status) values (NULL,'$full_name','$ph_number','$hash','$email','$verify_status');";
if($conn->query($sql)===TRUE)
{
    try {
        // Create the SMTP Transport
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
            ->setUsername('noreplybestsearch@gmail.com')
            ->setPassword('webproject123');
     
        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);
     
        // Create a message
        $message = new Swift_Message();
     
        // Set a "subject"
        $message->setSubject('Verification link');
     
        // Set the "From address"
        $message->setFrom(['noreplybestsearch@gmail.com' => 'BestSearch']);
     
        // Set the "To address" [Use setTo method for multiple recipients, argument should be array]
        $message->addTo($email,$full_name);
        $message->setContentType("text/html");
     
        // Add "CC" address [Use setCc method for multiple recipients, argument should be array]
        // $message->addCc('recipient@gmail.com', 'recipient name');
     
        // Add "BCC" address [Use setBcc method for multiple recipients, argument should be array]
        // $message->addBcc('recipient@gmail.com', 'recipient name');
     
        // Add an "Attachment" (Also, the dynamic data can be attached)
        // $attachment = Swift_Attachment::fromPath('example.xls');
        // $attachment->setFilename('report.xls');
        // $message->attach($attachment);
     
        // Add inline "Image"
        $inline_attachment = Swift_Image::fromPath('./images/logo.png');
        $cid = $message->embed($inline_attachment);
     
        // Set the plain-text "Body"
        $message->setBody("Please verify you profile by clicking on the url <br><br> <a href='http://localhost/Verify.php?email=$email&id=$hemail'>Click here</a>");
     
        // Set a "Body"
       
        
     
        // Send the message
        $result = $mailer->send($message);
        echo "1";
        // echo "Message sent!";
    } catch (Exception $e) {
      echo $e->getMessage();
    }
   
}
else
{
    echo "0";
}
?>