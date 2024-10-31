<?php

namespace IntegrationHelper\IntegrationVersionMagento\Model;

use IntegrationHelper\IntegrationVersion\GetterParentItemCollectionInterface;

class GetterParentItemCollection implements GetterParentItemCollectionInterface
{

    public function getItems(string $table, string $identityColumn, array $columns, int $page = 1, int $limit = 10000): iterable
    {
        return [];
    }

    public function getItem(string $table, string $identityColumn, mixed $identityValue, array $columns): iterable
    {
        return [];
    }
}
