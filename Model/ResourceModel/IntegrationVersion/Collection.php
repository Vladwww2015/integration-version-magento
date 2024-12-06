<?php

namespace IntegrationHelper\IntegrationVersionMagento\Model\ResourceModel\IntegrationVersion;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = \IntegrationHelper\IntegrationVersionMagento\Model\IntegrationVersion::ID;
    protected function _construct()
    {
        $this->_init(
            \IntegrationHelper\IntegrationVersionMagento\Model\IntegrationVersion::class,
            \IntegrationHelper\IntegrationVersionMagento\Model\ResourceModel\IntegrationVersion::class
        );
    }
}
