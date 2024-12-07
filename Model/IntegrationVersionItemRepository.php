<?php

namespace IntegrationHelper\IntegrationVersionMagento\Model;

use IntegrationHelper\IntegrationVersion\Model\IntegrationVersionItemInterface;
use IntegrationHelper\IntegrationVersion\Repository\IntegrationVersionItemRepositoryInterface;
use IntegrationHelper\IntegrationVersionMagento\Api\Data\IntegrationVersionItemInterface as MagentoIntegrationVersionItemInterface;
use IntegrationHelper\IntegrationVersionMagento\Model\IntegrationVersionItem as ModelIntegrationVersionItem;
use IntegrationHelper\IntegrationVersionMagento\Model\IntegrationVersionItemFactory as ModelIntegrationVersionItemFactory;
use IntegrationHelper\IntegrationVersionMagento\Model\ResourceModel\IntegrationVersionItem as ResourceIntegrationVersionItem;
use IntegrationHelper\IntegrationVersionMagento\Model\ResourceModel\IntegrationVersionItem\Collection;
use IntegrationHelper\IntegrationVersionMagento\Model\ResourceModel\IntegrationVersionItem\CollectionFactory;
use Magento\Framework\App\ResourceConnection;

class IntegrationVersionItemRepository implements IntegrationVersionItemRepositoryInterface
{
    public function __construct(
        protected ModelIntegrationVersionItemFactory $modelFactory,
        protected ResourceIntegrationVersionItem $resource,
        protected CollectionFactory $collectionFactory,
        protected ResourceConnection $resourceConnection
    ) {

    }

    public function getItems(int $parentId, array $identityValues): iterable
    {
        /**
         * @var $collection Collection
         */
        $collection = $this->collectionFactory->create();
        $collection
            ->addFieldToFilter(MagentoIntegrationVersionItemInterface::PARENT_ID, $parentId)
            ->addFieldToFilter(MagentoIntegrationVersionItemInterface::IDENTITY_VALUE, ['in' => $identityValues]);

        return $collection->getItems();
    }

    public function getItemById(int $id): IntegrationVersionItemInterface
    {
        /**
         * @var $model ModelIntegrationVersionItem
         */
        $model = $this->modelFactory->create();
        $this->resource->load($model, $id);

        return $model;
    }

    public function getIdentitiesForNewestVersions(
        int $parentId,
        string $oldExternalHash,
        string $updatedAt,
        int $page = 1,
        int $limit = 10000
    ): iterable
    {
        /**
         * @var $collection Collection
         */
        $collection = $this->collectionFactory->create();
        $page = ($page - 1);
        $collection
            ->addFieldToFilter('version_hash', ['neq' => $oldExternalHash])
            ->addFieldToFilter('parent_id', $parentId)
            ->addFieldToFilter('parent_id', $parentId)
            ->addFieldToFilter('hash_date_time', ['>' => $updatedAt])
            ->addFieldToFilter('status', IntegrationVersionItemInterface::STATUS_SUCCESS);

        $collection->setCurPage($page);
        $collection->setPageSize($limit);

        return $collection->getItems();
    }

    public function multiCreateOrUpdate(array $values, array $uniqueBy): IntegrationVersionItemRepositoryInterface
    {
        $connection = $this->resourceConnection->getConnection();
        $connection
            ->insertOnDuplicate(MagentoIntegrationVersionItemInterface::TABLE, $values);

        return $this;
    }

    public function deleteByIds(array $ids): IntegrationVersionItemRepositoryInterface
    {
        $connection = $this->resourceConnection->getConnection();
        $sql = $connection
            ->deleteFromSelect(
                $connection
                    ->select()
                    ->from(MagentoIntegrationVersionItemInterface::TABLE)
                    ->where(MagentoIntegrationVersionItemInterface::ID . ' ?', $ids),
                MagentoIntegrationVersionItemInterface::TABLE
            );

        $connection->query($sql);

        return $this;
    }

    public function updateAll(array $values, int $parentId): IntegrationVersionItemRepositoryInterface
    {
        $connection = $this->resourceConnection->getConnection();
        $connection
            ->update(
                MagentoIntegrationVersionItemInterface::TABLE,
                $values,
                MagentoIntegrationVersionItemInterface::PARENT_ID . '=' . $parentId
            );

        return $this;
    }

    public function setStatusDeletedIfNotSuccess(int $parentId): IntegrationVersionItemRepositoryInterface
    {
        $connection = $this->resourceConnection->getConnection();
        $connection
            ->update(
                MagentoIntegrationVersionItemInterface::TABLE,
                [
                    MagentoIntegrationVersionItemInterface::STATUS => IntegrationVersionItemInterface::STATUS_DELETED
                ],
                MagentoIntegrationVersionItemInterface::STATUS . '!=' . IntegrationVersionItemInterface::STATUS_SUCCESS
            );

        return $this;
    }
}
