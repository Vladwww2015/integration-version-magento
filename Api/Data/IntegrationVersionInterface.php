<?php

namespace IntegrationHelper\IntegrationVersionMagento\Api\Data;
interface IntegrationVersionInterface
{
    public const TABLE = 'integration_version';

    public const ID = 'entity_id';
    public const SOURCE = 'source';
    public const TABLE_NAME = 'table_name';
    public const IDENTITY_COLUMN = 'identity_column';
    public const HASH = 'hash';
    public const STATUS = 'status';
    public const CHECKSUM_COLUMNS = 'checksum_columns';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';
}
