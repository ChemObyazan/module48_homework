<?php

interface MachineInterface {
    public function moveForward();
    public function moveBack();
    public function honk();
    public function activateWipers();
}


abstract class Machine implements MachineInterface {
    protected $interior;
    public function __construct($interior = "Стандартная отделка салона") {
        $this->interior = $interior;
    }

    public function moveForward() {
        echo get_class($this) . " едет вперед.\n";
    }

    public function moveBack() {
        echo get_class($this) . " едет назад.\n";
    }

    public function honk() {
        echo get_class($this) . " сигналит: Бип-бип!\n";
    }

    public function activateWipers() {
        echo get_class($this) . " включает дворники.\n";
    }

    public function showInterior() {
        echo get_class($this) . " с отделкой: " . $this->interior . "\n";
    }

    abstract public function specialAbility();
}


class Car extends Machine {
    public function specialAbility() {
        echo "Активирую закись азота!\n";
    }
}


class Bulldozer extends Machine {
    public function specialAbility() {
        echo "Управляю ковшом.\n";
    }
}

class Tank extends Machine {
    public function specialAbility() {
        echo "Стреляю из пушки!\n";
    }
}


function useMachine(Machine $Machine) {
    $Machine->moveForward();
    $Machine->specialAbility();
    $Machine->honk();
    $Machine->activateWipers();
    $Machine->showInterior();
}

// Пример использования
$car = new Car("Кожаная отделка салона");
$bulldozer = new Bulldozer("Прочная металлическая отделка салона");
$tank = new Tank("Броневая отделка салона");

useMachine($car);
echo "\n";
useMachine($bulldozer);
echo "\n";
useMachine($tank);

?>
