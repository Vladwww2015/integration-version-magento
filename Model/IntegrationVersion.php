<?php

namespace IntegrationHelper\IntegrationVersionMagento\Model;

use IntegrationHelper\IntegrationVersion\Model\IntegrationVersionInterface;
use Magento\Framework\Model\AbstractModel;

class IntegrationVersion
    extends AbstractModel
    implements IntegrationVersionInterface,
    \IntegrationHelper\IntegrationVersionMagento\Api\Data\IntegrationVersionInterface
{
    protected function _construct()
    {
        $this->_init(ResourceModel\IntegrationVersion::class);
    }

    public function getIdValue(): int
    {
        return (int) $this->getData(static::ID);
    }

    public function setIdValue(int $id): IntegrationVersionInterface
    {
        return $this->setData(static::ID, $id);
    }

    public function getSource(): string
    {
        return $this->getData(static::SOURCE);
    }

    public function setSource(string $source): IntegrationVersionInterface
    {
        return $this->setData(static::SOURCE, $source);
    }

    public function getTableName(): string
    {
        return $this->getData(static::TABLE_NAME);
    }

    public function setTableName(string $tableName): IntegrationVersionInterface
    {
        return $this->setData(static::TABLE_NAME, $tableName);
    }

    public function getHash(): string
    {
        return $this->getData(static::HASH);
    }

    public function setHash(string $hash): IntegrationVersionInterface
    {
        return $this->setData(static::HASH, $hash);
    }

    public function getIdentityColumn(): string
    {
        return $this->getData(static::IDENTITY_COLUMN);
    }

    public function setIdentityColumn(string $identityColumn): IntegrationVersionInterface
    {
        return $this->setData(static::IDENTITY_COLUMN, $identityColumn);
    }

    public function getStatus(): string
    {
        return $this->getData(static::STATUS);
    }

    public function setStatus(string $status): IntegrationVersionInterface
    {
        return $this->setData(static::STATUS, $status);
    }

    public function getChecksumColumns(): array
    {
        return $this->getData(static::CHECKSUM_COLUMNS);
    }

    public function setChecksumColumns(array $columns): IntegrationVersionInterface
    {
        return $this->setData(static::CHECKSUM_COLUMNS, $columns);
    }

    public function getUpdatedAtValue(): string
    {
        return $this->getData(static::UPDATED_AT);
    }

    public function setUpdatedAtValue(string $updatedAt): IntegrationVersionInterface
    {
        return $this->setData(static::UPDATED_AT, $updatedAt);
    }
}
