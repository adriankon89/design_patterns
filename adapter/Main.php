<?php

declare(strict_types=1);

interface Player
{
    public function play();
}

class SimplePlayer implements Player
{
    public function __construct(private string $videoUrl) {}

    public function play()
    {
        echo 'simple player';
    }
}

class OrangeSitePlayer
{
    public function __construct(private string $videoUrl) {}

    public function play()
    {
        echo 'organge site player';
    }

    public function userValid() {}

    public function verifyUserAge() {}
}

class OrangePlayerAdapter implements Player
{
    public function __construct(private OrangeSitePlayer $player) {}

    public function play()
    {
        if ($this->player->userValid() && $this->player->verifyUserAge()) {
            $this->player->play();
        }
    }
}

$simplePlayer = new SimplePlayer('url');
$simplePlayer->play();
echo "\n";
$orangePlayer = new OrangeSitePlayer('url');
$orangePlayerAdapter = new OrangePlayerAdapter($orangePlayer);
$orangePlayerAdapter->play();
