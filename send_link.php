<?php 
require_once("./connect_db.php");
require_once './mail/vendor/autoload.php';
$email = $_POST['email'];
$hash = password_hash($email,PASSWORD_DEFAULT);
$rehash = password_hash($hash,PASSWORD_DEFAULT);
$sql = "select name,verify_status from users where email='$email'";
$result = $conn->query($sql);
if($result->num_rows > 0)
{
    $row = $result->fetch_assoc();
    if($row['verify_status']=="0")
    {
        echo "Your account has not been verified!";
    }
    else {
    $name = $row['name'];
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
        $message->setSubject('Password reset link');
     
        // Set the "From address"
        $message->setFrom(['noreplybestsearch@gmail.com' => 'BestSearch']);
     
        // Set the "To address" [Use setTo method for multiple recipients, argument should be array]
        $message->addTo($email,$name);
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
        $message->setBody("Please reset your profile password by clicking on the url <br><br> <a href='http://localhost/reset.php?email=$email&id=$hash&value=$rehash'>Click here</a>");
     
        // Set a "Body"
       
        // Send the message
        $result = $mailer->send($message);
        echo "1";
        // echo "Message sent!";
    } catch (Exception $e) {
      echo $e->getMessage();
    }
}
}
else
{
    echo "Account does not exist";
}
?>