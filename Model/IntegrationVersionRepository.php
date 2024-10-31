<?php

namespace IntegrationHelper\IntegrationVersionMagento\Model;

use IntegrationHelper\IntegrationVersion\Model\IntegrationVersionInterface;
use IntegrationHelper\IntegrationVersionMagento\Api\Data\IntegrationVersionInterface as MagentoIntegrationVersionInterface;
use IntegrationHelper\IntegrationVersion\Repository\IntegrationVersionRepositoryInterface;
use IntegrationHelper\IntegrationVersionMagento\Model\IntegrationVersion as ModelIntegrationVersion;
use IntegrationHelper\IntegrationVersionMagento\Model\IntegrationVersionFactory as ModelIntegrationVersionFactory;
use IntegrationHelper\IntegrationVersionMagento\Model\ResourceModel\IntegrationVersion as ResourceModelIntegrationVersion;
use IntegrationHelper\IntegrationVersionMagento\Model\ResourceModel\IntegrationVersion\Collection;
use IntegrationHelper\IntegrationVersionMagento\Model\ResourceModel\IntegrationVersion\CollectionFactory;

class IntegrationVersionRepository implements IntegrationVersionRepositoryInterface
{
    /**
     * @param IntegrationVersionFactory $modelFactory
     * @param ResourceModelIntegrationVersion $resource
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        protected ModelIntegrationVersionFactory $modelFactory,
        protected ResourceModelIntegrationVersion $resource,
        protected CollectionFactory $collectionFactory
    ) {

    }

    /**
     * @return iterable
     */
    public function getItems(): iterable
    {
        /**
         * @var $collection Collection
         */
        $collection = $this->collectionFactory->create();

        return $collection->getItems();
    }

    /**
     * @param string $source
     * @return IntegrationVersionInterface
     */
    public function getItemBySource(string $source): IntegrationVersionInterface
    {
        /**
         * @var $collection Collection
         */
        $collection = $this->collectionFactory->create();
        $collection->addFieldToFilter(MagentoIntegrationVersionInterface::SOURCE, $source);

        return $collection->getFirstItem();
    }

    /**
     * @param int $id
     * @return IntegrationVersionInterface
     */
    public function getItemById(int $id): IntegrationVersionInterface
    {
        /**
         * @var $collection Collection
         */
        $collection = $this->collectionFactory->create();
        $collection->addFieldToFilter(MagentoIntegrationVersionInterface::ID, $id);

        return $collection->getFirstItem();
    }

    /**
     * @param IntegrationVersionInterface $item
     * @return IntegrationVersionInterface
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function updateItem(IntegrationVersionInterface $item): IntegrationVersionInterface
    {
        $this->resource->save($item);

        return $item;
    }

    /**
     * @param array $data
     * @return IntegrationVersionInterface
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function createItem(array $data): IntegrationVersionInterface
    {
        /**
         * @var $model ModelIntegrationVersion
         */
        $model = $this->modelFactory->create();
        $model->setData($data);
        $this->resource->save($model);

        return $model;
    }
}
