<?php
namespace Udemy\email;

class SendEmail
{
  public static function sendEmail($to, $subject, $body, $from = "")
  {
    if (strlen($from) == 0)
      $from = getenv('SMTP_FROM');

    // SwiftMailer has its own autoloader, therefore
    //append '\' to each SwiftMailer object creation

    // create swiftmailer transport system
      $transport = \Swift_SmtpTransport::newInstance(getenv('SMTP_HOST'), getenv('SMTP_PORT'))
        ->setUsername(getenv('SMTP_USER'))
        ->setPassword(getenv('SMTP_PASS'));

    /* can alternatively use a different transport such as Sendmail or Mail eg.
    for Sendmail...
    $transport = Swift_SendmailTransport::newInstance('/usr/sbin/sendmail -bs');

    for Mail...
    $transport = Swift_MailTransport::newInstance();

    */

    // create mailer using previously created transport
      $mailer = \Swift_Mailer::newInstance($transport);

    // create message
      $message = \Swift_Message::newInstance()
        ->setSubject($subject)
        ->setFrom($from)
        ->setTo($to)
        ->setBody($body, 'text/html');

    // send message
      $result = $mailer->send($message);
  }
}
