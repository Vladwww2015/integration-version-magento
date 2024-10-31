<?php

namespace IntegrationHelper\IntegrationVersionMagento\Model\ResourceModel\IntegrationVersion;

use Magento\Eav\Model\Entity\Collection\VersionControl\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \IntegrationHelper\IntegrationVersionMagento\Model\IntegrationVersion::class,
            \IntegrationHelper\IntegrationVersionMagento\Model\ResourceModel\IntegrationVersion::class
        );
    }
}
