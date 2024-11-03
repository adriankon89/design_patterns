<?php

declare(strict_types=1);

namespace App\Mediator;

use Exception;

/**
 * Like a mediator for example in a court give a possibility to communicate with opposite sides. Like me in my family. I'm a mediator between my brother and father. It's a behavioral design pattern.
 */
final readonly class Message
{
    public function __construct(
        private string $text,
        private string $recipient
    ) {
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getRecipient(): string
    {
        return $this->recipient;
    }
}

final readonly class FamilyMember
{
    public function __construct(
        private string $name,
        private MediatorInterface $mediator
    ) {
    }

    public function receive(Message $message): void
    {
        echo "#Recipient {$this->name}# message: '{$message->getText()}'\n";
    }

    public function send(Message $message): void
    {
        $this->mediator->send($message);
    }

    public function getName(): string
    {
        return $this->name;
    }
}

interface MediatorInterface
{
    public function send(Message $message): void;
}


final class Mediator implements MediatorInterface
{
    private array $familyMembers = [];

    public function addFamilyMember(FamilyMember $familyMember): void
    {
        $this->familyMembers[] = $familyMember;
    }

    public function send(Message $message): void
    {
        $recipient = array_filter($this->familyMembers, function ($member) use ($message) {
            return $message->getRecipient() === $member->getName();
        });

        if (empty($recipient)) {
            throw new Exception('Recipient not found!');
        }
        $recipient = reset($recipient);
        $recipient->receive($message);
    }
}


$mediator = new Mediator();

$mom = new FamilyMember('Mom', $mediator);
$dad = new FamilyMember('Dad', $mediator);
$childA = new FamilyMember('childA', $mediator);

$mediator->addFamilyMember($mom);
$mediator->addFamilyMember($dad);
$mediator->addFamilyMember($childA);

$dad->send(new Message('Where are our money!', 'Mom'));
$mom->send(new Message('I bought new coffee machine....', 'Dad'));
