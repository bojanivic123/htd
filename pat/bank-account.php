<?php  

class BankAccount {
    protected $currentState;
    protected $isBlocked;
    public function __construct()
    {
        $this->currentState = 0;
        $this->isBlocked = false;
    }
}

class SimpleBankAccount extends BankAccount {
    public function deposit($amount)
    {
        $this->currentState += $amount;
        echo "You deposited " . $amount . ".";

        if ($this->isBlocked && $this->currentState >= 0) {
            $this->isBlocked = false;
            echo "Your account is now unblocked.";
        }
    }
    public function withdraw($amount)
    {
        if ($this->isBlocked) {
            echo "Your account is blocked.";
            return;
        }
        $this->currentState -= $amount;
        echo "You withdrew " . $amount . ".";

        if ($this->currentState <= -200) {
            $this->isBlocked = true;
            echo "Your account is blocked!";
        }
    }
}

class SecuredBankAccount extends BankAccount {
    public function deposit($amount)
    {
        $this->currentState += $amount - 0.025 * $amount;
        echo "You deposited " . $amount . ".";

        if ($this->isBlocked && $this->currentState >= 0) {
            $this->isBlocked = false;
            echo "Your account is now unblocked.";
        }
    }
    public function withdraw($amount)
    {
        if ($this->isBlocked) {
            echo "Your account is blocked.";
            return;
        }
        $this->currentState -= $amount + 0.025 * $amount;
        echo "You withdrew " . $amount . ".";

        if ($this->currentState <= -1000) {
            $this->isBlocked = true;
            echo "Your account is blocked!";
        }
    }
}

class User {
    private $name;
    private $surname;
    private $simpleAccount;
    private $securedAccount;
    public function __construct($name, $surname)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->simpleAccount = new SimpleBankAccount();
        $this->securedAccount = new SecuredBankAccount();
    }
    public function depositOnSimple($amount)
    {
        $this->simpleAccount->deposit($amount);
    }
    public function withdrawFromSimple($amount)
    {
        $this->simpleAccount->withdraw($amount);
    }
    public function depositOnSecured($amount)
    {
        $this->securedAccount->deposit($amount);
    }
    public function withdrawFromSecured($amount)
    {
        $this->securedAccount->withdraw($amount);
    }
}

$user1 = new User("Bojan", "Ivic");




















































?>