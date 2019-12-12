<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EnviarMail extends Controller {

    //
    public static function EnviarMail($strDesde, $strNmDesde, $strAsunto, $strMensaje, $strDirecciones, $strAdjunto = "", $strNombreAdjunto = "") {
        try {
            $mail = new PHPMailer\PHPMailer(true);
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = 'smtp.googlemail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = 'dieguinosorio@gmail.com';                     // SMTP username
            $mail->Password = 'Diego1enDios11*$$$';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port = 465;                                    // TCP port to connect to
            //Recipients
            $mail->setFrom($strDesde, $strNmDesde);
            //$mail->addAddress('auxsistemas@aba.com.co', 'Joe User');     // Add a recipient
            $mail->addAddress($strDirecciones);               // Name is optional
//            $mail->addReplyTo('info@example.com', 'Information');
//            $mail->addCC('cc@example.com');
//            $mail->addBCC('bcc@example.com');

            // Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            $mail->addAttachment($strAdjunto, $strNombreAdjunto);    // Optional name
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $strAsunto;
            $mail->Body = $strMensaje;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $a) {
            echo "Ocurrio un error en el envio de mail";
        }
    }

}
