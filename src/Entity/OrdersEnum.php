<?php
/**
 * Created by PhpStorm.
 * User: mindaugas
 * Date: 18.4.3
 * Time: 23.01
 */

namespace Doctrine\DBAL; //????

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class OrdersEnum extends Type
{
    const enum_name = "enumOrdersStatuses";
    //order's statuses
    const status_created = "created";
    const status_in_progress = "in progress";
    const status_repaired = "repaired";
    const status_canceled = "canceled";
    const status_suspended = "suspended";
    const status_ready_to_return = "ready to return";
    const status_returned = "returned";

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