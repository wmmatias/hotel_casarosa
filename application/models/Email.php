<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
class Email extends CI_Model {

  function reservation_email($form_data, $vkey)
  { 
      //form data
      $name = $this->security->xss_clean($form_data['firstname']. ' '. $form_data['lastname']);
      $room_number = $this->security->xss_clean($form_data['room_number']);
      $to = $this->security->xss_clean($form_data['email']); 
      $subject = $this->security->xss_clean('Reservation Verification');
      $from = $this->security->xss_clean('casarosabnb04@gmail.com');
      $body = '
      <p>Good day! '.$name.',</p>
      <p>You temporarily reserve room '.$room_number.' in HOTEL CASAROSA cauayan isabela. you need to verify this email account for us to validate if this reservation is not a fake reservation, just <a href="http://casarosa.local/reservations/verify/'.$vkey.'" target="_blank"><strong>Click Here</strong></a> to verify.</p>
      </br>
      <p>keep this as your reservation receipt</p>
      </br>
      </br>
      </br>
      </br>
      <p>Regards,</p>
      </br>
      </br>
      <p><strong>Hotel Casarosa Management</strong></p>
      </br>
      </br>
      <small><i>This email message (including attachments, if any) is intended for the use of the individual or the entity to whom it is addressed and may contain information that is privileged, proprietary, confidential and exempt from disclosure. If you are not an intended recipient of this e-mail, you are not authorized to duplicate, copy, retransmit, or redistribute it by any means. Please delete it and any attachments immediately and notify the sender that you have received it in error.</i></small>
      ';

      //server setup for mailing
      $mail = new PHPMailer(true);
      $mail->isSMTP();
      $mail->Host = 'ssl://smtp.googlemail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'casarosabnb04@gmail.com';
      $mail->Password = 'xafzgcamwsrmsbnh';
      $mail->Port = 465;
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

      //compose email
      $mail->setFrom($from);
      $mail->addAddress($to);
      $mail->Subject = $subject;
      $mail->isHtml(true);
      $mail->Body = $body;

      //condition checking if email sent
      return ($mail->send() ? 'Message sent' : 'Message not sent');
      
  }

}
