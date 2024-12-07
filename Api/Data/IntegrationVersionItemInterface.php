<?php

namespace IntegrationHelper\IntegrationVersionMagento\Api\Data;
interface IntegrationVersionItemInterface
{
    public const TABLE = 'integration_version_item';

    public const ID = 'entity_id';
    public const PARENT_ID = 'parent_id';
    public const IDENTITY_VALUE = 'identity_value';
    public const VERSION_HASH = 'version_hash';
    public const STATUS = 'status';
    public const CHECKSUM = 'checksum';

    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';
    public const HASH_DATE_TIME = 'hash_date_time';
}
