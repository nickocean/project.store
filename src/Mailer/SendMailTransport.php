<?php


namespace Src\Mailer;

use Src\Mailer\MailMessage;


class SendMailTransport
{
    public function mail()
    {
        return mail($to, $subject, $message);
    }
}