<?php

interface WebPageBuilder
{
    public function addHeader();
    public function addBody();
    public function addFooter();
}

class CompanyPageBuilder implements WebPageBuilder
{
    private $companyPage;

    public function __construct()
    {
        $this->companyPage = new CompanyPage();
    }

    public function addHeader()
    {
        $this->companyPage->setHeader('Company Header');
    }

    public function addBody()
    {
        $this->companyPage->setBody('Company Body');
    }

    public function addFooter()
    {
        $this->companyPage->setFooter('Company Footer');
    }

    public function getResult(): CompanyPage
    {
        return $this->companyPage;
    }
}

class CompanyPage
{
    private $header;
    private $body;
    private $footer;
    public function setHeader(string $header) {}
    public function setBody(string $body) {}
    public function setFooter(string $footer) {}
}

class Director
{
    public function __construct(private WebPageBuilder $builder) {}

    public function build(): WebPageBuilder
    {
        $this->builder->addHeader();
        $this->builder->addBody();
        $this->builder->addFooter();
        return $this->builder;
    }
}

$companyPageCreator = new CompanyPageBuilder();
$director = new Director($companyPageCreator);
$director->build();

$companyPage = $companyPageCreator->getResult();
