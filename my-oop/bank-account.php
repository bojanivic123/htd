<?php  

echo "<pre>";

class BankAccount {
    protected $currentBalance;
    protected $isBlocked;
    public function __construct()
    {
        $this->currentBalance = 0;
        $this->isBlocked = false;
    }
}

class SimpleBankAccount extends BankAccount {
    public function deposit($amount)
    {
        $this->currentBalance += $amount;
        if ($this->isBlocked && $this->currentBalance >= 0) {
            $this->isBlocked = false;
            echo "Your account is now unblocked.";
        }
    }
    public function withdraw($amount)
    {
        if ($this->isBlocked) {
            echo "Your account is currently blocked!";
            return; 
        }
        $this->currentBalance -= $amount;
        if ($this->currentBalance <= -200) {
            $this->isBlocked = true;
        }
    }
}

class SecuredBankAccount extends BankAccount {
    public function deposit($amount)
    {
        $this->currentBalance += $amount - $amount * 0.025;
        if ($this->isBlocked && $this->currentBalance >= 0) {
            $this->isBlocked = false;
            echo "Your account is now unblocked.";
        }
    }
    public function withdraw($amount)
    {
        if ($this->isBlocked) {
            echo "Your account is currently blocked!";
            return; 
        }
        $this->currentBalance -= $amount + $amount * 0.025;
        if ($this->currentBalance <= -1000) {
            $this->isBlocked = true;
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
    public function depositMoneyOnSimple($amount)
    {
        return $this->simpleAccount->deposit($amount);
    }
    public function depositMoneyOnSecured($amount)
    {
        return $this->securedAccount->deposit($amount);
    }
    public function withdrawMoneyFromSimple($amount)
    {
        return $this->simpleAccount->withdraw($amount);
    }
    public function withdrawMoneyFromSecured($amount)
    {
        return $this->securedAccount->withdraw($amount);
    }
}



echo "</pre>";

?>