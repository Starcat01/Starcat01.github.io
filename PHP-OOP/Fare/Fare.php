<?php
class Fare {
    private $age;
    private $distance;

    public function __construct($age, $distance) {
        $this->age = $age;
        $this->distance = $distance;
    }

    public function calculateFare() {
        $fare = 8;
        if ($this->distance > 4) {
            $fare += ($this->distance - 4);
        }
        if ($this->age >= 60) {
            $fare -= ($fare * 0.20);
        }
        return $fare;
    }
}

?>
