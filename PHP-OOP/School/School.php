<?php
  // School.php

  class School {
    private $yearLevel;
    private $units;
    private $withLab;

    public function __construct($yearLevel, $units, $withLab) {
      $this->yearLevel = $yearLevel;
      $this->units = $units;
      $this->withLab = $withLab;
    }

    public function getCost() {
      $pricePerUnit = $this->getPricePerUnit();
      $cost = $pricePerUnit * $this->units;
      return $cost;
    }

    private function getPricePerUnit() {
      switch ($this->yearLevel) {
        case 1:
          return $this->withLab ? 3359 : 550;
        case 2:
          return $this->withLab ? 4000 : 630;
        case 3:
          return $this->withLab ? 2890 : 470;
        case 4:
          return $this->withLab ? 3555 : 501;
        default:
          return 0;
      }
    }
  }
?>
