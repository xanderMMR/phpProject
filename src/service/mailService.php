<?php

require '../../../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;

class mailService {
    
    
   function enviarMail($correo,$clave){
    
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 2;
        $mail->Host = 'smtp.hostinger.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'administracion@invierteselva.com';
        $mail->Password = '0207Lucas7#';
        $mail->setFrom('administracion@invierteselva.com', 'administracion@invierteselva.com');
        //$mail->addReplyTo('administracion@invierteselva.com', 'administracion@invierteselva.com');
        $mail->addAddress($correo,$correo);
        $mail->Subject = 'INVIERTESELVA - Clave de acceso';
        $mail->Body = 'La clave de acceso asociada a su usuario es: '.$clave;


        if (!$mail->send()) {
            //echo 'Mailer Error: ' . $mail->ErrorInfo;
            
            return 0;
            
        } else {
            //echo 'The email message was sent.';
            
            return 1;
        }
       
   } 
    
}
