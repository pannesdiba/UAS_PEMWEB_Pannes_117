<?php
class Visitor {
    private $name;
    private $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function displayInfo() {
        echo "Name: {$this->name}<br>";
        echo "Age: {$this->age}<br>";
    }
}
?>
