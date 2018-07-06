<?php

/**
 * Created by PhpStorm.
 * User: quan
 * Date: 6/23/18
 * Time: 8:35 AM
 */

namespace App\Repositories;


interface NotificationRepositoryInterface
{
    public function findNotificationByReceiverIdPaginate($userId, $order, $limit);
}