<?php
require_once './vendor/autoload.php';
 
try {
    // Create the SMTP Transport
    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
        ->setUsername('pavan.beis.15@acharya.ac.in')
        ->setPassword('sonupavan');
 
    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);
 
    // Create a message
    $message = new Swift_Message();
 
    // Set a "subject"
    $message->setSubject('Demo message using the SwiftMailer library.');
 
    // Set the "From address"
    $message->setFrom(['pavan.beis.15@acharya.ac.in' => 'Pavan P Galagali']);
 
    // Set the "To address" [Use setTo method for multiple recipients, argument should be array]
    $message->addTo('adithyar82@gmail.com','Adithya Ramesh');
 
    // Add "CC" address [Use setCc method for multiple recipients, argument should be array]
    // $message->addCc('recipient@gmail.com', 'recipient name');
 
    // Add "BCC" address [Use setBcc method for multiple recipients, argument should be array]
    // $message->addBcc('recipient@gmail.com', 'recipient name');
 
    // Add an "Attachment" (Also, the dynamic data can be attached)
    // $attachment = Swift_Attachment::fromPath('example.xls');
    // $attachment->setFilename('report.xls');
    // $message->attach($attachment);
 
    // Add inline "Image"
    // $inline_attachment = Swift_Image::fromPath('nature.jpg');
    // $cid = $message->embed($inline_attachment);
 
    // Set the plain-text "Body"
    $message->setBody("This is the plain text body of the message.\nThanks,\nAdmin");
 
    // Set a "Body"
    $message->addPart('This is the HTML version of the message.<h1>Adithya Ramesh</h1>');
    
 
    // Send the message
    $result = $mailer->send($message);
    echo "Message sent!";
} catch (Exception $e) {
  echo $e->getMessage();
}