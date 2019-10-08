<?php
require_once("./connect_db.php");
require_once './mail/vendor/autoload.php';
session_start();
if($_POST['flag']=="1")
{
    $old = $_POST['pass_old'];
    $new = $_POST['pass_new'];
    $hash = password_hash($new,PASSWORD_DEFAULT);
    $email = $_SESSION['email'];
    $sql = "select password,name from users where email='$email'";
    $result = $conn->query($sql);
    if($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        if(password_verify($old,$row['password'])==TRUE)
        {
            $sql="update users set password='$hash' where email='$email'";
            $result = $conn->query($sql);
            if($result===TRUE)
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
                    $message->setSubject('Account settings change alert');
                 
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
                    $message->setBody("Your password was recently changed! If you didn't initiate this please change your password immediately by clicking on the url below<br><br><a href='http://localhost/pass_forget.php'>Click here</a>");
                 
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
                echo "Error updating the password";
            }
        }
        else{
            echo "Old password didn't match our records! Aborting changes...";
        }
    }
    else
    {
        echo "Error finding your account";        
    }
}
else if($_POST['flag']=="0")
{
    $name = $_POST['name'];
    $email = $_SESSION['email'];
    $phnum = $_POST['phone_number'];
    $sql = "update users set name='$name', ph_number='$phnum' where email='$email'";
    $result= $conn->query($sql);
    if($result===TRUE)
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
            $message->setSubject('Account settings change alert');
         
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
            $message->setBody("Your account details was recently changed! If you didn't initiate this please change your password immediately by clicking on the url given below<br><br><a href='http://localhost/pass_forget.php'>Click here</a>");
         
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
        echo "Error updating your details"; 
    }

}
?>