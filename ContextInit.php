<?php
namespace IntegrationHelper\IntegrationVersionMagento;

use IntegrationHelper\IntegrationVersion\Context;
use IntegrationHelper\IntegrationVersion\DateTimeInterface;
use IntegrationHelper\IntegrationVersion\GetterParentItemCollectionInterface;
use IntegrationHelper\IntegrationVersion\HashGeneratorInterface;
use IntegrationHelper\IntegrationVersion\IntegrationVersionItemManagerInterface;
use IntegrationHelper\IntegrationVersion\IntegrationVersionManagerInterface;
use IntegrationHelper\IntegrationVersion\Repository\IntegrationVersionItemRepositoryInterface;
use IntegrationHelper\IntegrationVersion\Repository\IntegrationVersionRepositoryInterface;

class ContextInit
{
    public function __construct(
        protected GetterParentItemCollectionInterface $getterParentItemCollection,
        protected IntegrationVersionItemRepositoryInterface $integrationVersionItemRepository,
        protected IntegrationVersionRepositoryInterface $integrationVersionRepository,
        protected DateTimeInterface $dateTime,
        protected HashGeneratorInterface $hashGenerator,
        protected IntegrationVersionManagerInterface $integrationVersionManager,
        protected IntegrationVersionItemManagerInterface $integrationVersionItemManager
    ){
        Context::getInstance()
            ->setDateTime($dateTime)
            ->setGetterParentItemCollection($getterParentItemCollection)
            ->setIntegrationVersionManager($integrationVersionManager)
            ->setIntegrationVersionItemManager($integrationVersionItemManager)
            ->setIntegrationVersionRepository($integrationVersionRepository)
            ->setIntegrationVersionItemRepository($integrationVersionItemRepository)
            ->setHashGenerator($hashGenerator);
    }
}
