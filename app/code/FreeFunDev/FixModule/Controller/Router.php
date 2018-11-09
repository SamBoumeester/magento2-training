<?php
/**
 * Copyright © 2017 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace FreeFunDev\FixModule\Controller;
/**
 * Class Router
 * @package FreeFunDev\FixModule\Controller
 */
//class Router implements \Magento\Framework\App\RouterInterface
class Router extends \Magento\Framework\App\Router\Base implements \Magento\Framework\App\RouterInterface
{
    /**
     * @var \Magento\Framework\App\ActionFactory|null
     */
    protected $_actionFactory = null;


    /**
     * Router constructor.
     * @param \Magento\Framework\App\ActionFactory $actionFactory
     */
    public function __construct(
        \Magento\Framework\App\ActionFactory $actionFactory
    ){
        $this->_actionFactory = $actionFactory;
    }

    /**
     * @param \Magento\Framework\App\RequestInterface $request
     * @return null
     */
    public function match(\Magento\Framework\App\RequestInterface $request) {
        $urlParts = $this->parsePathInfo($request);

        if (!empty($urlParts)) {
            $request->setModuleName($urlParts[0]);
            $request->setControllerName($urlParts[1]);
            $request->setActionName($urlParts[2]);
            $params = array_slice($urlParts, 3);
            return $this->_actionFactory->create('\Magento\Framework\App\Action\Forward', ['request' => $request], ['request' => $params]);
        }

        return false;
    }

    private function parsePathInfo(\Magento\Framework\App\RequestInterface $request)
    {
        $pathInfo = trim($request->getPathInfo());
        $pathInfo = str_replace('/', '-', $pathInfo);
        $parts = explode('-', $pathInfo);
        array_shift($parts);
        return $parts;
    }
}