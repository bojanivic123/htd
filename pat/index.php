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
//         return $this->count++;
//     }
// }

// Counter::getInstance()->increment();
// Counter::getInstance()->increment();

// echo Counter::getInstance()->getCount();

//////////////////////////////////////////////////////////////

// interface Driving {
//     public function drive();
// }

// class Car implements Driving {
//     public function drive()
//     {
//         echo "Driving a car.";
//     }
// }

// class Bike implements Driving {
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

///////////////////////////////////////////////////////////////////////

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
//     public function createVehicle();
//     public function createPassenger();
// }

// class CarFactory implements VehicleFactory {
//     public function createVehicle()
//     {
//         return new Car;
//     }
//     public function createPassenger()
//     {
//         return new CarPassenger();
//     }
// }

// class BikeFactory implements VehicleFactory {
//     public function createVehicle()
//     {
//         return new Bike;
//     }
//     public function createPassenger()
//     {
//         return new BikePassenger();
//     }
// }

///////////////////////////////////////////////////////






























?>