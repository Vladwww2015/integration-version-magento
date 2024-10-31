<?php

namespace IntegrationHelper\IntegrationVersionMagento\Model\ResourceModel\IntegrationVersionItem;

use Magento\Eav\Model\Entity\Collection\VersionControl\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \IntegrationHelper\IntegrationVersionMagento\Model\IntegrationVersionItem::class,
            \IntegrationHelper\IntegrationVersionMagento\Model\ResourceModel\IntegrationVersionItem::class
        );
    }
}
