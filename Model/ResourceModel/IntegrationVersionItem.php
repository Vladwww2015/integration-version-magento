<?php

namespace IntegrationHelper\IntegrationVersionMagento\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class IntegrationVersionItem extends AbstractDb
{
    protected function _construct()
    {
        $this->_init(
            \IntegrationHelper\IntegrationVersionMagento\Model\IntegrationVersionItem::TABLE,
            \IntegrationHelper\IntegrationVersionMagento\Model\IntegrationVersionItem::ID
        );
    }
}
