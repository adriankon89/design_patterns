<?php

interface IComputerFactory
{
    public function createComputer(): ComputerProduct;
    public function createMonitor(): MonitorProduct;
}



class GamingComputerFactory implements IComputerFactory
{
    public function createComputer(): ComputerProduct
    {
        return new GamingComputer();
    }
    public function createMonitor(): MonitorProduct
    {
        return new GamingMonitor();
    }
}

interface ComputerProduct
{
    public function create();
}

interface MonitorProduct
{
    public function create();
}

class GamingComputer implements ComputerProduct
{
    public function create()
    {
        echo 'create gaming computer product';
    }
}

class GamingMonitor implements MonitorProduct
{
    public function create()
    {
        echo 'create gaming monitor product';
    }
}

# Client
$gamingComputer = new GamingComputerFactory();
$gamingComputer->createComputer()->create();
echo "\n";
$gamingComputer->createMonitor()->create();
