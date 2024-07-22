<?php  

echo "<pre>"; 

interface Vehicle {
    public function inspect();
}

interface VehicleFactory {
    public function makeVehicle();
}

interface AbstractFactory {
    public function makeCarFactory();
    public function makeBikeFactory();
}

class InspectionService {
    private static $instance;
    private $count;
    private function __construct()
    {
        $this->count = 0;
    }
    static function getInstance()
    {
        if (self::$instance == NULL) {
            self::$instance = new InspectionService();
        }
        return self::$instance;
    }
    public function getCount()
    {
        return $this->count;
    }
    public function inspectVehicle(Vehicle $vehicle)
    {
        $vehicle->inspect();
        $this->count++;
    }
}

class Car implements Vehicle {
    public function inspect()
    {
        echo "Inspecting a car";
    }
}

class Bike implements Vehicle {
    public function inspect()
    {
        echo "Inspecting a bike";
    }
}

class CarFactory implements VehicleFactory {
    public function makeVehicle()
    {
        return new Car();
    }
}

class BikeFactory implements VehicleFactory {
    public function makeVehicle()
    {
        return new Bike();
    }
}

class ConcreteFactory implements AbstractFactory {
    public function makeCarFactory()
    {
        return new CarFactory();
    }
    public function makeBikeFactory()
    {
        return new BikeFactory();
    }
}

$conceteFactory = new ConcreteFactory();
$carFactory = $conceteFactory->makeCarFactory();
$bikeFactory = $conceteFactory->makeBikeFactory();
$car = $carFactory->makeVehicle();
$bike = $bikeFactory->makeVehicle();
InspectionService::getInstance()->inspectVehicle($car);
InspectionService::getInstance()->inspectVehicle($bike);
echo "Trenutno je pregledano vozila: " . InspectionService::getInstance()->getCount() . ".";



echo "</pre>";

?>

