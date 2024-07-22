<?php   

echo "<pre>";

class MailService {
    private static $instance;
    private $count;
    private function __construct()
    {
        $this->count = 0;
    }
    public static function getInstance()
    {
        if (self::$instance == NULL) {
            self::$instance = new MailService();
        }
        return self::$instance;
    }
    public function getCount()
    {
        return $this->count;
    }
    public function sendEmail(Email $newEmail)
    {
        echo "Sending email to: " . $newEmail->getRecipient() .  ".";
        $this->count++;
    }
}

class Email {
    private $recipient;
    private $theme;
    private $message;
    public function __construct($recipient, $theme, $message)
    {
        $this->recipient = $recipient;
        $this->theme = $theme;
        $this->message = $message;
    }
    public function getRecipient()
    {
        return $this->recipient;
    }
}

class EmailFactory {
    public function makeEmail($recipient, $theme, $message)
    {
        return new Email($recipient, $theme, $message);
    }
}

$emailFactory = new EmailFactory();
$email1 = $emailFactory->makeEmail("Bojan Ivic", "Resenje", "Sve je u redu.");
MailService::getInstance()->sendEmail($email1);
echo "Trenutno broj poslatih mejlova je " . MailService::getInstance()->getCount() . ".";



echo "</pre>";

?>