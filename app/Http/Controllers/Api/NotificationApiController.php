<?php

namespace App\Http\Controllers\Api;

use App\Repositories\NotificationRepositoryInterface;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @resource Post
 */
class NotificationApiController extends ApiController
{
    protected $notificationRepository;

    public function __construct(
        NotificationRepositoryInterface $notificationRepository
    )
    {
        parent::__construct();
        $this->notificationRepository = $notificationRepository;
    }

    /**
     * GET user notification list
     * Param: limit, page
     * @param $subDomain
     * @param Request $request
     * @return mixed
     */
    public function getNotifications($subDomain, Request $request)
    {
        $user = Auth::user();
        return $this->notificationRepository->findNotificationByReceiverIdPaginate($user->id, $request->order, $request->limit);
    }
}
