<?php

namespace App\Types;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class OrdersEnum extends Type
{
    private const enum_name = "enumOrdersStatuses";
    //order's statuses
    private const status_created = "created";
    private const status_in_progress = "in progress";
    private const status_repaired = "repaired";
    private const status_canceled = "canceled";
    private const status_suspended = "suspended";
    private const status_ready_to_return = "ready to return";
    private const status_returned = "returned";

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return "ENUM(
         'created',
         'in progress',
         'repaired',
         'canceled',
         'suspended',
         'ready to return',
         'returned')";
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return $value;
    }


    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        $dbValues = array(self::status_created,
            self::status_in_progress,
            self::status_repaired,
            self::status_canceled,
            self::status_suspended,
            self::status_ready_to_return,
            self::status_returned);
        if (!in_array($value, $dbValues)) {
            throw new \InvalidArgumentException("Invalid status");
        }
        return $value;
    }

    public function getName()
    {
        return self::enum_name;
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform)
    {
        return true;
    }
}

Type::addType('enumOrdersStatuses', 'App\Types\OrdersEnum');