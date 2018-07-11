<?php

class Mailer
{

    public static function setTransport($object)
    {

    }

    public function send($message)
    {

    }

    public function getEmail()
    {
        return $this->to;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function __construct($to, $title, $message)
    {
        $this->to = $to;
        $this->title = $title;
        $this->message = $message;
    }
}

class MailMessage
{
    public function __construct($to, $title, $message)
    {
        $this->to = $to;
        $this->title = $title;
        $this->message = $message;
    }
}

class SendMailTransport extends Mailer
{

}



$mailer = new Mailer();
$mailMessage = new MailMessage();
$mailer->setTransport(new SendMailTransport());
$mailer->send($this->getEmail(), $this->getTitle(), $this->getMessage());