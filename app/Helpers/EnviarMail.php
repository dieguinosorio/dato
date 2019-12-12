<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnviarMail
 *
 * @author dlaravel
 */
namespace App\Helpers;
  
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EnviarMail {
    public static function EnviarCorreo($strDesde, $strNmDesde, $strAsunto, $strMensaje, $strDirecciones, $strAdjunto = "", $strNombreAdjunto = "") {
        try {
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = 2 /*SMTP::DEBUG_SERVER*/;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = 'smtp.googlemail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = 'aplicant.dato@gmail.com';                     // SMTP username
            $mail->Password = 'Dato2019*';                               // SMTP password
            $mail->SMTPSecure = 'ssl'/*PHPMailer::ENCRYPTION_STARTTLS*/;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
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
            if($strAdjunto !=''){
                $mail->addAttachment($strAdjunto, $strNombreAdjunto);    // Optional name
            }
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $strAsunto;
            $mail->Body = $strMensaje;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->setLanguage('es');
            $mail->send();
            return back()->with('status',"Mensjae Enviado");
        } catch (Exception $a) {
            return back()->with('status',"Erro al enviar mensaje".$a->getMessage());
        }
    }
}
