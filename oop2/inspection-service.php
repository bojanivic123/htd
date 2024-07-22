<?php

class InspectionService
{
    private static $instance;
    private $inspectedVehiclesCount;

    private function __construct()
    {
        $this->inspectedVehiclesCount = 0;
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new InspectionService();
        }

        return self::$instance;
    }

    public function getInspectedVehiclesCount()
    {
        return $this->inspectedVehiclesCount;
    }

    public function inspectVehicle(Vehicle $vehicle)
    {
        echo $vehicle->inspect() . '<br>';

        $this->inspectedVehiclesCount++;
    }
}

interface Vehicle
{
    public function inspect();
}

class Car implements Vehicle
{
    public function inspect()
    {
        echo 'Inspecting Car...';
    }
}

class Bike implements Vehicle
{
    public function inspect()
    {
        echo 'Inspecting Bike...';
    }
}

interface VehicleFactory
{
    public function makeVehicle(): Vehicle;
}

class CarFactory implements VehicleFactory
{
    public function makeVehicle(): Vehicle
    {
        return new Car();
    }
}

class BikeFactory implements VehicleFactory
{
    public function makeVehicle(): Vehicle
    {
        return new Bike();
    }
}

$carFactory = new CarFactory();
$bikeFactory = new BikeFactory();

$car = $carFactory->makeVehicle();
$bike = $bikeFactory->makeVehicle();

InspectionService::getInstance()->inspectVehicle($car);
InspectionService::getInstance()->inspectVehicle($bike);
echo 'Inspected vehicles: ' . InspectionService::getInstance()->getInspectedVehiclesCount();
