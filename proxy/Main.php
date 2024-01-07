<?php

interface Video
{
    public function play();
    public function addComment();
}

class DifficultImplementationForYoutube implements Video
{
    public function play()
    {
        echo 'Fancy code play';
    }

    public function addComment()
    {
        echo 'Fancy code add comment';
    }
}

class PlayerProxy implements Video
{
    public function play()
    {
        echo 'Simple code play';
    }

    public function addComment()
    {
        echo 'Fancy code add comment';
    }
}

#before
$player = new DifficultImplementationForYoutube();
$player->play();
#after
$player = new PlayerProxy();
$player->play();
