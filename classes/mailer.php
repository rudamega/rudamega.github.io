<?php

if (array_key_exists('message', $_POST)) {

  $to = "your@mail.com"; // Change Email to Your

  $subject = "Completed form ".$_SERVER["HTTP_REFERER"]; // Message Subject

  $subject = "=?utf-8?b?". base64_encode($subject) ."?="; // Dont Touch

  /**
   * Message content
   */ 
  $message = "
  <table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:18px;line-height: 40px'>
    <tr style='text-align: center'>
      <td colspan='2' style='padding: 30px 0'>
        <h1>Completed form ".$_SERVER['HTTP_REFERER']."</h1>
      </td>
    </tr>
    <tr>
      <td style='border-bottom:1px solid #eee'>Name</td>
      <td style='border-bottom:1px solid #eee'>".$_POST["username"]."</td>
    </tr>
    <tr>
      <td style='border-bottom:1px solid #eee'>Email</td>
      <td style='border-bottom:1px solid #eee'>".$_POST["email"]."</td>
    </tr>
    <tr>
      <td style='border-bottom:1px solid #eee'>IP</td>
      <td style='border-bottom:1px solid #eee'>".$_SERVER["REMOTE_ADDR"]."</td>
    </tr>
    <tr>
      <td style='border-bottom:1px solid #eee'>Message</td>
      <td style='border-bottom:1px solid #eee'>".$_POST["message"]."</td>
    </tr>
  </table>
  ";
  /**
   * /Message content
   */ 

  // Dont Touch
  $headers = 'Content-type: text/html; charset="utf-8"';
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Date: ". date('D, d M Y h:i:s O') ."\r\n";
  mail($to, $subject, $message, $headers);
  echo $_POST['username'];

}

?>
