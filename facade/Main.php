<?php

class AmazonFacade
{
    public function __construct(private string $amazonApiKey, private int $productId) {}

    public function buy()
    {
        $amazonApi = new FancyAmazonApi();
        $amazonApi->setApiKey($this->amazonApiKey);
        $amazonApi->setProductId($this->productId);
        #rest of the logic
    }
}

class FancyAmazonApi
{
    private string $apiKey;
    private int $productId;
    public function setApiKey(string $apiKey) {}
    public function setProductId(int $productId) {}
    private function connect() {}
    private function verify() {}
    private function charge() {}
    private function bufy() {}
}

$amazonFacade = new AmazonFacade('xx', 1234);
$amazonFacade->buy();
