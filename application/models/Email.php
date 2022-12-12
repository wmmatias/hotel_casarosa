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
      <p>You temporarily reserve room '.$room_number.' in HOTEL CASAROSA cauayan isabela. you need to verify this email account and pay a partial payment for us to validate if this reservation is not a fake reservation, gcash qrcode attached below for you to scan and make a payment for 500 pesos.</p>
      </br>
      </br>
      <p>after payment make a response to this email and send the reference number with the following format and attached screenshot.</p>
      </br>
      </br>
      </br>
      <p>room:'.$room_number.'</p>
      <p>name:'.$name.'</p>
      <p>check-in:</p>
      <p>check-out:</p>
      <p>gcash reference:</p>
      <p>amount:</p>
      </br>
      </br>
      </br>
      <img src="https://lh3.googleusercontent.com/w8ZsfLFEpzkyi2NBFgClm6JussTpFCFui3hEEwB4SHc3P8hXoNzAYD4B4Wa_k69-lxDiHZoz33Y8_ohV99abAbpr3VAtfhzpUtOqhJrnW4tB-NwLXb61_wo0sTt2ZpVFqw5fJemZ3uRuMkQe4aYauInyZkMSFPCmtBjxUvHMzaXeNdLHvP1JngVQpy9-J2wVtqVAN0aRp9EnK7HAJUmLSPH7tTNgjM_3ggVCDchQRrEvp76eseeTnxHDmO9jyzmM7IUTAbrBzocOsjEv4l72G0lZxG7m3Z3St8Lsxf35mFPNox9SiWJ_HSWCCzzrl77lFo3QCzc9Bh8k9vePtnED5bRjkyOAfMzpJ1qQzb41LdJX54EC7h2kOkYPjNb70DCol6vNFm5Jwq1rUf61kq8WdiMBoYSWcz9iesMwjch4w4XEYhI2_c0Kq4plxvTl1BtuED8Q3O-2MVYBEE3sqdVeeEBt_Qo-OqpAxv_qsuSixcIER5DkijErmZ1P9WYrP7YJ9LvCE-MzhHn1_RssxLXGob2YYeEFW_WryxHwMkNQPQwQil6qxqMjARQ6Cr4Gl4j3Il7hRWYyXkUcRSlyYJ4-U532PchorZal8keW1yT8kGJAsqDJU9-FAu5FkxPWVgj2OKJxW8Q3bo_OikQcZwllKEhgHkaPHvPfMBj4AkPbw8BrWJWHaqvgKb6hDD_1yJS_u6SlxWYnt6yZ96onulRQ-J3HSSAx5UAPU_QKfiOlk2hmWWPL3HH7dt-tZ-wj1ncjCmclTuugHtt1rOdaJbodeaw8v7FK2Nxlhew3LFFi0Ux4NLCFsViXIuRNAaZZqt5nLrk-L5AD4WBowbADLn9DSfseTrmAVWWc7abbB4zJFI9d7Z_FuM_O1dKIrVROcJb015Zvte_nb7Em2I0wFiJv6I3EkyPbPescNy6N1aUIAkO6KaaKINKny4qRpOGqG01uzpxcw7W5Dcx3Uk1tUF9ERL8V3R_6QF4crm86phO-rWujQkRCHoDWgdpO-d9KbuNsAkLFHx7zXZZuvp7obqBBAYeTgGE0IGOq68U_-BprX1P4D7oH4r8Wc1WOQ-it6ygXupI7ruGXOFrbBm1w2Ac3xAIeTm20t6I=w432-h425-no?authuser=4" alt="gcash_qrcode" style="width: 200px;">
      </br>
      </br>
      </br>
      <p>keep this as your reservation receipt and <a href="http://casarosa.local/reservations/verify/'.$vkey.'" target="_blank"><strong>Click Here</strong></a> to verify.</p>
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
