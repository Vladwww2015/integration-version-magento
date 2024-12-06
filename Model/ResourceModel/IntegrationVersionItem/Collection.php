<?php

namespace IntegrationHelper\IntegrationVersionMagento\Model\ResourceModel\IntegrationVersionItem;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = \IntegrationHelper\IntegrationVersionMagento\Model\IntegrationVersionItem::ID;

    protected function _construct()
    {
        $this->_init(
            \IntegrationHelper\IntegrationVersionMagento\Model\IntegrationVersionItem::class,
            \IntegrationHelper\IntegrationVersionMagento\Model\ResourceModel\IntegrationVersionItem::class
        );
    }
}
