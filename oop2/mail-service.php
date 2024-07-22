<?php

class MailService
{
    private static $instance;
    private $sentEmailsCount;

    private function __construct()
    {
        $this->sentEmailsCount = 0;
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new MailService();
        }

        return self::$instance;
    }

    public function getSentEmailsCount()
    {
        return $this->sentEmailsCount;
    }

    public function sendEmail(Email $email)
    {
        echo 'Sending email to: ' . $email->getRecipient() . '<br>';

        $this->sentEmailsCount++;
    }
}

class Email
{
    private $to;
    private $subject;
    private $content;

    public function __construct(string $to, string $subject, string $content)
    {
        $this->to = $to;
        $this->subject = $subject;
        $this->content = $content;
    }

    public function getRecipient()
    {
        return $this->to;
    }
}

class EmailFactory
{
    public function createEmail(string $to, string $subject, string $content)
    {
        return new Email($to, $subject, $content);
    }
}

$emailFactory = new EmailFactory();

$registrationEmail = $emailFactory->createEmail('marko.m@gmail.com', 'Registration', 'You have successfully registered and logged in.');
$subscriptionEmail = $emailFactory->createEmail('nenad.n@gmail.com', 'Subscription', 'You have successfully subscribed to the newsletter.');

MailService::getInstance()->sendEmail($registrationEmail);
MailService::getInstance()->sendEmail($subscriptionEmail);
echo 'Sent emails: ' . MailService::getInstance()->getSentEmailsCount();
