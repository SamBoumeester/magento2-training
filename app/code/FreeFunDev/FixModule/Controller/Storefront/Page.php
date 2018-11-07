<?php
/**
 * Copyright © 2017 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace FreeFunDev\FixModule\Controller\Storefront;

use Magento\Framework\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Raw;
use Magento\Framework\Controller\ResultInterface;

/**
 * Class Page
 * @package FreeFunDev\FixModule\Controller\Storefront
 */
class Page extends Action\Action
{
    /**
     * @var Raw
     */
    protected $resultRaw;

     public function __construct(
         Action\Context $context,
         Raw $resultRaw
     ){
         $this->resultRaw = $resultRaw;
         parent::__construct($context);
     }


    /**
     * @return ResponseInterface|Raw|ResultInterface
     */
    public function execute()
    {
        return $this->resultRaw->setContents('Custom storefront page');
    }

}