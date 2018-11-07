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
class Router implements \Magento\Framework\App\RouterInterface
{
    /**
     * @var \Magento\Framework\App\ActionFactory|null
     */
    protected $_actionFactory = null;

    /**
     * Router constructor.
     * @param \Magento\Framework\App\ActionFactory $actionFactory
     */
    public function __construct(\Magento\Framework\App\ActionFactory $actionFactory)
    {
        $this->_actionFactory = $actionFactory;
    }

    /**
     * @param \Magento\Framework\App\RequestInterface $request
     * @return null
     */
    public function match(\Magento\Framework\App\RequestInterface $request)
    {
        $pathInfo = $request->getPathInfo();

        $urlPattern = '%^/(.*?)-(.*?)-(.*?)$%';
        if (preg_match($urlPattern, $pathInfo, $matches)) {
            $request->setModuleName($matches[1]);
            $request->setControllerName($matches[2]);
            $request->setActionName($matches[3]);
            return $this->_actionFactory->create('\Magento\Framework\App\Action\Forward', ['request' => $request]);
        }

        return false;
    }
}