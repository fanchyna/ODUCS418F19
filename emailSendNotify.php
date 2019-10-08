<?php
require 'PHPMailer-5.2.26/PHPMailerAutoload.php';
// $anu = 'anusha.m21@gmail.com';

class sendEmailTo{
  public function sendEmailOnRegistration($email,$userid){
          $mail = new PHPMailer;


      try{
          $mail->isSMTP(); // Set mailer to use SMTP
          $mail->SMTPAuth = true; // Enable SMTP authentication
          $mail->Port = '465';
          $mail->Host = 'smtp.gmail.com';
          $mail->Username = 'rcodu001@gmail.com';
          $mail->Password = 'hANDSON@123';
          $mail->SMTPDebug = 0; 
          $mail->SMTPSecure = 'ssl'; 
          //$mail->SMTPSecure= 'tls';
          $mail->From='rcodu001@gmail.com';
          $senderEmailId = $email;
          // echo "<script>console.log($senderEmailId);</script>";
          // $emailId="anusha.m21@gmail.com";
          $subject="CAR 4 U - Test Email";
          $matter="HI USER, <br> Thank for choosing us .Please click on below invite link for confirmation.<a href='http://localhost/~ajaygupta/Anu_ODU_CS-518/verifyemail.php?uid='".$userid.">Confirm</a>";
          $mail->AddAddress($senderEmailId); 
                $mail->isHTML(true);            // Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = $matter;
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';  

                  if(!$mail->Send()){
                      // echo "Failed at email Notify file " .$emailId." ".$role." ".$invite."Error Info:".$mail->ErrorInfo;
                    }else{
                    
                    }
                }
                catch(Exception $e){
                    // echo $e->getMessage();
                    // var_dump($e);
                }

          //print_r($mail);

          //echo get_include_path();
  }


 function sendEmailforForgotPassword($email,$newpwd){
  $mail = new PHPMailer;


  try{
      $mail->isSMTP(); // Set mailer to use SMTP
      $mail->SMTPAuth = true; // Enable SMTP authentication
      $mail->Port = '465';
      $mail->Host = 'smtp.gmail.com';
      $mail->Username = 'rcodu001@gmail.com';
      $mail->Password = 'hANDSON@123';
      $mail->SMTPDebug = 0; 
      $mail->SMTPSecure = 'ssl'; 
      //$mail->SMTPSecure= 'tls';
      $mail->From='rcodu001@gmail.com';
      $senderEmailId = $email;
      // echo "<script>console.log($senderEmailId);</script>";
      // $emailId="anusha.m21@gmail.com";
      $subject="CAR 4 U - Temporary Password";
      $matter="Hello User,<br> Please use the below temporary password for loggin into system. <br>Temporary Password :".$newpwd."<a href='http://localhost/~ajaygupta/Anu_ODU_CS-518/index.php'>Login</a>";
      $mail->AddAddress($senderEmailId); 
            $mail->isHTML(true);            // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $matter;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';  

              if(!$mail->Send()){
                  // echo "Failed at email Notify file " .$emailId." ".$role." ".$invite."Error Info:".$mail->ErrorInfo;
                }else{
                
                }
            }
            catch(Exception $e){
                // echo $e->getMessage();
                // var_dump($e);
            }

 }
}


?>
