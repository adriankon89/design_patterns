<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

interface Ticket
{
    public function calculatePrice(): int;
    public function getDescription(): string;
}

abstract class TicketDecorator implements Ticket
{
    public function __construct(
        protected Ticket $ticket
    ) {}
}

class RegularTicket implements Ticket
{
    public function calculatePrice(): int
    {
        return 40;
    }


    public function getDescription(): string
    {
        return 'Regular ticket';
    }
}

class Snacks extends TicketDecorator
{
    private const PRICE = 10;
    public function calculatePrice(): int
    {
        return $this->ticket->calculatePrice() + self::PRICE;
    }


    public function getDescription(): string
    {
        return $this->ticket->getDescription() . ' with snacks';
    }

}


class VipChair extends TicketDecorator
{
    private const PRICE = 15;

    public function calculatePrice(): int
    {
        return $this->ticket->calculatePrice() + self::PRICE;
    }

    public function getDescription(): string
    {
        return $this->ticket->getDescription() . ' with vip chair';
    }
}

$ticket = new RegularTicket();
$ticket = new Snacks($ticket);
$ticket = new VipChair($ticket);
echo "Ticket price {$ticket->calculatePrice()} ,contains: {$ticket->getDescription()}" ;
