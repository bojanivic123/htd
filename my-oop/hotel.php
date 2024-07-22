<?php  

echo "<pre>";

interface RoomFactory {
    public function createRoom($roomNumber); 
}

class Room {
    protected $roomNumber;
    protected $isAvailable;
    public function __construct($roomNumber)
    {
        $this->roomNumber = $roomNumber;
        $this->isAvailable = true;
    }
    public function isRoomAvailable()
    {
        return $this->isAvailable;
    }
    public function rent()
    {
        $this->isAvailable = false;
    }
    public function leave()
    {
        $this->isAvailable = true; 
    }
    public function getRoomNumber()
    {
        return $this->roomNumber;
    }
}

class SingleRoom extends Room {}

class DoubleRoom extends Room {}

class TripleRoom extends Room {}

class SingleRoomFactory implements RoomFactory {
    public function createRoom($roomNumber)
    {
        return new SingleRoom($roomNumber);
    }
}

class DoubleRoomFactory implements RoomFactory {
    public function createRoom($roomNumber)
    {
        return new DoubleRoom($roomNumber);
    }
}

class TripleRoomFactory implements RoomFactory {
    public function createRoom($roomNumber)
    {
        return new TripleRoom($roomNumber);
    }
}

class Hotel {
    private static $instance;
    private $rooms;
    private $availableRooms;
    private $subscribers;
    private function __construct()
    {
        $this->availableRooms = [
            SingleRoom::class => 0,
            DoubleRoom::class => 0,
            TripleRoom::class => 0
        ]; 
        $this->subscribers = [
            SingleRoom::class => [],
            DoubleRoom::class => [],
            TripleRoom::class => []
        ];
    }
    static function getInstance()
    {
        if (self::$instance == NULL) {
            self::$instance = new Hotel();
        }
        return self::$instance;
    }
    public function addRoom($newRoom)
    {
        $roomNumber = $newRoom->getRoomNumber();
        $roomType = get_class($newRoom);
        $this->availableRooms[$roomType]++;
        $this->rooms[$roomNumber] = $newRoom;
    }

    public function isTypeOfRoomAvailable($roomType)
    {
        return $this->availableRooms[$roomType] > 0; 
    }
    public function checkIn($roomType)
    {
        if ($this->isTypeOfRoomAvailable($roomType)) {
            foreach ($this->rooms as $room) {
                $room->rent();
                $this->availableRooms[$roomType]--;
                return;
            }
        } else {
            echo "Currently we don't have rooms of type " . $roomType . ".";
        }
    }
    public function checkOut($roomNumber)
    {
        $room = $this->rooms[$roomNumber];
        $roomType = get_class($room);
        $room->leave();
        $this->availableRooms[$roomType]++;
        $this->NotifySubscriber($room); 
    }
    public function subscribe($roomType, $user)
    {
        $this->subscribers[$roomType][] = $user;
    }
    public function NotifySubscriber($room)
    {
        $roomNumber = $room->getNumber();
        $roomType = get_class($room);
        foreach ($this->subscribers[$roomType] as $subscriber) {
            $subscriber->getMessage("Room with number " . $roomNumber . " with type " . $roomType . " is leaved.");
        }
    }
}

class User {
    private $name;
    private $surname;
    public function __construct($name, $surname)
    {
        $this->name = $name;
        $this->surname = $surname;   
    }
    public function getMessage($message)
    {
        echo "You have just got a new notification: " . $message . ".";
    }
}

$singleRoomFactory = new SingleRoomFactory();
$doubleRoomFactory = new DoubleRoomFactory();
$tripleRoomFactory = new TripleRoomFactory();
$singleRoom = $singleRoomFactory->createRoom(566);
$singleRoom2 = $singleRoomFactory->createRoom(166);
$singleRoom3 = $singleRoomFactory->createRoom(66);
$doubleRoom = $doubleRoomFactory->createRoom(333);
$doubleRoom2 = $doubleRoomFactory->createRoom(33);
$doubleRoom3 = $doubleRoomFactory->createRoom(433);
$tripleRoom = $tripleRoomFactory->createRoom(5);
$tripleRoom2 = $tripleRoomFactory->createRoom(15);
$tripleRoom3 = $tripleRoomFactory->createRoom(25);

Hotel::getInstance()->addRoom($singleRoom);
Hotel::getInstance()->addRoom($singleRoom2);
Hotel::getInstance()->addRoom($singleRoom3);
Hotel::getInstance()->addRoom($doubleRoom);
Hotel::getInstance()->addRoom($doubleRoom2);
Hotel::getInstance()->addRoom($doubleRoom3);
Hotel::getInstance()->addRoom($tripleRoom);
Hotel::getInstance()->addRoom($tripleRoom2);
Hotel::getInstance()->addRoom($tripleRoom3);
$user = new User("Bojan", "Ivic");
Hotel::getInstance()->subscribe(DoubleRoom::class, $user);
Hotel::getInstance()->checkIn(DoubleRoom::class);
Hotel::getInstance()->checkOut(1);





echo "</pre>";

?>