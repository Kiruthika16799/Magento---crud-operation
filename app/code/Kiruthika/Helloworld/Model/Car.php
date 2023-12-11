<?php

namespace Kiruthika\Helloworld\Model;

use Magento\Framework\Model\AbstractModel;
use Kiruthika\Helloworld\Model\ResourceModel\Car as ResourceModel;

class Car extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}

