<?php

namespace FreeFunDev\FixModule\Test\Unit\Controller;

use FreeFunDev\FixModule\Controller\Router;

class RouterTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @var FreeFunDev\FixModule\Controller\Router
     */
    protected $router;


    public function getURL()
    {
        $objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->router = $objectManager->getObject('FreeFunDev\FixModule\Controller\Router');
    }
}