<?php

namespace IntegrationHelper\IntegrationVersionMagento\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class IntegrationVersion extends AbstractDb
{
    protected function _construct()
    {
        $this->_init(
            \IntegrationHelper\IntegrationVersionMagento\Model\IntegrationVersion::TABLE,
            \IntegrationHelper\IntegrationVersionMagento\Model\IntegrationVersion::ID
        );
    }
}
