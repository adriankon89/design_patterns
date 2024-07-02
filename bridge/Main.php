<?php

declare(strict_types=1);

abstract class CarKey
{
    protected $car;

    public function __construct(Car $car)
    {
        $this->car = $car;
    }

    abstract public function useKey();
}

class ElectricCar implements Car
{
    public function start()
    {
        echo "Electric Car started.\n";
    }

    public function lock()
    {
        echo "Electric Car locked.\n";
    }
}

class Lorry implements Car
{
    public function start()
    {
        echo "Lorry Car started.\n";
    }

    public function lock()
    {
        echo "Lorry Car locked.\n";
    }
}

interface Car
{
    public function start();
    public function lock();
}

class StartCarButton extends CarKey
{
    public function useKey()
    {
        $this->car->start();
    }
}


class LockCarButton extends CarKey
{
    public function useKey()
    {
        $this->car->lock();
    }
}

$lorry = new Lorry();
$startCarButton = new StartCarButton($lorry);
$startCarButton->useKey();
