<?php

namespace IntegrationHelper\IntegrationVersionMagento\Model;

use IntegrationHelper\IntegrationVersion\Model\IntegrationVersionItemInterface;
use Magento\Framework\Model\AbstractModel;

class IntegrationVersionItem
    extends AbstractModel
    implements IntegrationVersionItemInterface,
    \IntegrationHelper\IntegrationVersionMagento\Api\Data\IntegrationVersionItemInterface
{
    protected function _construct()
    {
        $this->_init(ResourceModel\IntegrationVersionItem::class);
    }
    public function getIdValue(): int
    {
        return $this->getData(static::ID);
    }

    public function setIdValue(int $id): IntegrationVersionItemInterface
    {
        return $this->setData(static::ID, $id);
    }

    public function getParentId(): int
    {
        return $this->getData(static::PARENT_ID);
    }

    public function setParentId(int $parentId): IntegrationVersionItemInterface
    {
        return $this->setData(static::PARENT_ID, $parentId);
    }

    public function getStatus(): string
    {
        return $this->getData(static::STATUS);
    }

    public function setStatus(string $status): IntegrationVersionItemInterface
    {
        return $this->setData(static::STATUS, $status);
    }

    public function getVersionHash(): string
    {
        return $this->getData(static::VERSION_HASH);
    }

    public function setVersionHash(string $versionHash): IntegrationVersionItemInterface
    {
        return $this->setData(static::VERSION_HASH, $versionHash);
    }

    public function getIdentityValue(): string
    {
        return $this->getData(static::IDENTITY_VALUE);
    }

    public function setIdentityValue(string $identityValue): IntegrationVersionItemInterface
    {
        return $this->setData(static::IDENTITY_VALUE, $identityValue);
    }

    public function getChecksum(): string
    {
        return $this->getData(static::CHECKSUM);
    }

    public function setChecksum(string $checksum): IntegrationVersionItemInterface
    {
        return $this->setData(static::CHECKSUM, $checksum);
    }

    public function getUpdatedAtValue(): string
    {
        return $this->getData(static::UPDATED_AT);
    }

    public function setUpdatedAtValue(string $updatedAt): IntegrationVersionItemInterface
    {
        return $this->setData(static::UPDATED_AT, $updatedAt);
    }
}
