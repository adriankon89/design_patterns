<?php

class JustFactory
{
    public function createDocument(): Document
    {

        return new Document();

    }
}

class Document
{
    public function print()
    {
        echo 'It works!';
    }
}

$factory = new JustFactory();
$bicycle = $factory->createDocument();
$bicycle->print();
