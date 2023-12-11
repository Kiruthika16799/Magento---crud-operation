<?php

namespace Kiruthika\Helloworld\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Car extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('cars', 'id');
    }
}