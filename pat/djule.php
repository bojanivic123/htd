<?php 

// class Counter {
//     private static $instance;
//     private $count;
//     private function __construct()
//     {
//         $this->count = 0;
//     }
//     static function getInstance()
//     {
//         if (self::$instance == NULL) {
//             self::$instance = new Counter();
//         }
//         return self::$instance;
//     }
//     public function increment()
//     {
//         $this->count++;
//     }
//     public function getCount()
//     {
//         return $this->count;
//     }
// }

// Counter::getInstance()->increment();
// Counter::getInstance()->increment();
// Counter::getInstance()->increment();

// echo Counter::getInstance()->getCount();

/////////////////////////////////////////////////////////////

// interface Vehicle {
//     public function drive();
// }

// class Car implements Vehicle {
//     public function drive()
//     {
//         echo "Driving a car.";
//     }
// }

// class Bike implements Vehicle {
//     public function drive()
//     {
//         echo "Driving a bike.";
//     }
// }

// interface VehicleFactory {
//     public function makeVehicle();
// }

// class CarFactory implements VehicleFactory {
//     public function makeVehicle()
//     {
//         return new Car();
//     }
// }

// class BikeFactory implements VehicleFactory {
//     public function makeVehicle()
//     {
//         return new Bike();
//     }
// }

////////////////////////////////////////////////////////

// interface Vehicle {
//     public function drive();
// }

// class Car implements Vehicle {
//     public function drive()
//     {
//         echo "Driving a car.";
//     }
// }

// class Bike implements Vehicle {
//     public function drive()
//     {
//         echo "Driving a bike.";
//     }
// }

// abstract class VehicleFactory {
//     abstract public function makeVehicle();
// }

// class CarFactory extends VehicleFactory {
//     public function makeVehicle()
//     {
//         return new Car();
//     }
// }

// class BikeFactory extends VehicleFactory {
//     public function makeVehicle()
//     {
//         return new Bike();
//     }
// }

/////////////////////////////////////////////////////////

// interface Vehicle {
//     public function drive();
// }

// class Car implements Vehicle {
//     public function drive()
//     {
//         echo "Driving a car.";
//     }
// }

// class Bike implements Vehicle {
//     public function drive()
//     {
//         echo "Driving a bike.";
//     }
// }

// interface Passenger {
//     public function ride();
// }

// class CarPassenger implements Passenger {
//     public function ride()
//     {
//         echo "Riding a car.";
//     }
// }

// class BikePassenger implements Passenger {
//     public function ride()
//     {
//         echo "Riding a bike.";
//     }
// }

// interface VehicleFactory {
//     public function makeVehicle();
//     public function makePassenger();
// }

// class CarFactory implements VehicleFactory {
//     public function makeVehicle()
//     {
//         return new Car();
//     }
//     public function makePassenger()
//     {
//         return new CarPassenger();
//     }
// }

// class  BikeFactory implements VehicleFactory {
//     public function makeVehicle()
//     {
//         return new Bike();
//     }
//     public function makePassenger()
//     {
//         return new BikePassenger();
//     }
// }

/////////////////////////////////////////////////////////

// class Pizza {
//     private $size;
//     private $crust;

//     public function setSize($newSize)
//     {
//         $this->size = $newSize;
//     }
//     public function setCrust($newCrust)
//     {
//         $this->crust = $newCrust;
//     }
// }

// class PizzaBilder {
//     private $pizza;
//     public function __construct()
//     {
//         $this->pizza = new Pizza();
//     }
//     public function setSize($newSize)
//     {
//         $this->pizza->setSize($newSize);
//         return $this;
//     }
//     public function setCrust($newCrust)
//     {
//         $this->pizza->setCrust($newCrust);
//         return $this;
//     }
//     public function build()
//     {
//         return $this->pizza;
//     }
// }

///////////////////////////////////////////////////

// class Pizza {
//     private $size;
//     private $crust;
//     public function setSize($newSize)
//     {
//         $this->size = $newSize;
//     }
//     public function setCrust($newCrust)
//     {
//         $this->crust = $newCrust;
//     }
// }

// class PizzaBilder {
//     private $pizza;
//     public function __construct()
//     {
//         $this->pizza = new Pizza();
//     }
//     public function setSize($newSize)
//     {
//         $this->pizza->setSize($newSize);
//         return $this;
//     }
//     public function setCrust($newCrust)
//     {
//         $this->pizza->setCrust($newCrust);
//         return $this;
//     }
//     public function build()
//     {
//         return $this->pizza;
//     }
// }

// $bilder = new PizzaBilder();
// $pizza = $bilder->setSize("large")->setCrust("thin")->build();
// var_dump($pizza);

//////////////////////////////////////////////////////////////////////////


class BankAccount {
    protected $balance;
    protected $isBlocked;

    public function __construct() {
        $this->balance = 0;
        $this->isBlocked = false;
    }

    public function getBalance() {
        return $this->balance;
    }

    public function isBlocked() {
        return $this->isBlocked;
    }
}

class SimpleBankAccount extends BankAccount {
    public function deposit($amount) {
        $this->balance += $amount;
        echo 'Deposited ' . $amount . ' to simple bank account.<br>';

        if ($this->isBlocked && $this->balance >= 0) {
            $this->isBlocked = false;
            echo 'Simple bank account unblocked.<br>';
        }
    }

    public function withdraw($amount) {
        if ($this->isBlocked) {
            echo 'This simple bank account is blocked, cannot withdraw funds.<br>';
            return;
        }

        $this->balance -= $amount;
        echo 'Withdrew ' . $amount . ' from simple bank account.<br>';

        if ($this->balance <= -200) {
            echo 'Simple bank account is now blocked.<br>';
            $this->isBlocked = true;
        }
    }
}

class SecuredBankAccount extends BankAccount {
    public function deposit($amount) {
        $actualAmount = $amount - $amount * 0.025;

        $this->balance += $actualAmount;
        echo 'Deposited ' . $actualAmount . ' to secured bank account.<br>';

        if ($this->isBlocked && $this->balance >= 0) {
            $this->isBlocked = false;
            echo 'Secured bank account unblocked.<br>';
        }
    }

    public function withdraw($amount) {
        if ($this->isBlocked) {
            echo 'This secured bank account is blocked, cannot withdraw funds.<br>';
            return;
        }

        $actualAmount = $amount - $amount * 0.025;

        $this->balance -= $actualAmount;
        echo 'Withdrew ' . $actualAmount . ' from secured bank account.<br>';

        if ($this->balance <= -1000) {
            echo 'Secured bank account is now blocked.<br>';
            $this->isBlocked = true;
        }
    }
}

class User {
    public $firstName;
    public $lastName;
    private $simpleBankAccount;
    private $securedBankAccount;

    public function __construct(string $firstName, string $lastName) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->simpleBankAccount = new SimpleBankAccount();
        $this->securedBankAccount = new SecuredBankAccount();
    }

    public function depositMoneyToSimpleBankAccount($amount) {
        $this->simpleBankAccount->deposit($amount);
    }

    public function withdrawMoneyFromSimpleBankAccount($amount) {
        $this->simpleBankAccount->withdraw($amount);
    }

    public function echoSimpleBankAccountBalance() {
        echo 'Current balance (simple bank account): ' . $this->simpleBankAccount->getBalance() . '.<br>';
    }

    public function depositMoneyToSecuredBankAccount($amount) {
        $this->securedBankAccount->deposit($amount);
    }

    public function withdrawMoneyFromSecuredBankAccount($amount) {
        $this->securedBankAccount->withdraw($amount);
    }

    public function echoSecuredBankAccountBalance() {
        echo 'Current balance (secured bank account): ' . $this->securedBankAccount->getBalance() . '.<br>';
    }
}

$user = new User('Petar', 'Petrovic');
$user->depositMoneyToSimpleBankAccount(400);
$user->echoSimpleBankAccountBalance();
$user->withdrawMoneyFromSimpleBankAccount(500);
$user->echoSimpleBankAccountBalance();
$user->withdrawMoneyFromSimpleBankAccount(200);
$user->echoSimpleBankAccountBalance();
$user->withdrawMoneyFromSimpleBankAccount(100);
$user->depositMoneyToSimpleBankAccount(1000);

echo '<br>';

$user->depositMoneyToSecuredBankAccount(400);
$user->echoSecuredBankAccountBalance();
$user->withdrawMoneyFromSecuredBankAccount(500);
$user->echoSecuredBankAccountBalance();
$user->withdrawMoneyFromSecuredBankAccount(200);
$user->echoSecuredBankAccountBalance();
$user->withdrawMoneyFromSecuredBankAccount(100);
$user->depositMoneyToSecuredBankAccount(1000);



?>

