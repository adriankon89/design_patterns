<?php

declare(strict_types=1);

namespace App\TemplateMethod;

/**
 *Behavioral design pattern that defines a skeleton of an algorithm in a base class, deferring some steps to subclasses. This allows subclasses to implement specific steps while maintaining the overall algorithm structure.
 */
abstract class Insurance
{
    public function __construct(
        private Driver $driver,
        private Car $car
    ) {
    }

    final public function reportDamage(): void
    {
        $this->checkCarinCepik();
        $this->checkDriver();
        $this->evaluateDamage();
        $this->makePayment();
    }

    private function checkCarinCepik(): void
    {
    }

    private function checkDriver(): void
    {
    }

    abstract protected function evaluateDamage();
    abstract protected function makePayment();
}

class AvivaInsurance extends Insurance
{
    private function evaluateDamage(): void
    {

    }

    private function makePayment(): void
    {
    }
}


class Driver
{
}

class Car
{
}
