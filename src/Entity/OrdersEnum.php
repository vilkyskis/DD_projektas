<?php
declare(strict_types=1);

namespace App\Entity;

use MyCLabs\Enum\Enum;

class OrdersEnum extends Enum
{
    public const status_created = "created";
    public const status_in_progress = "in progress";
    public const status_repaired = "repaired";
    public const status_canceled = "canceled";
    public const status_suspended = "suspended";
    public const status_ready_to_return = "ready to return";
    public const status_returned = "returned";
}