<?php

namespace App\Http\Controllers\ClientApi;

use App\Notification;
use App\Repositories\NotificationRepositoryInterface;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\NotificationResource;

/**
 * @resource Notification
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

        $notifications = $this->notificationRepository->findNotificationByReceiverIdPaginate($user->id, $request->order, $request->limit);

        return NotificationResource::collection($notifications);
    }

    public function getNotificationsAfter($subDomain, $notificationId, Request $request)
    {
        $user = Auth::user();

        $notifications = Notification::where("receiver_id", $user->id);
        dd($notifications);
        $notifications = $this->notificationRepository->loadAfterModelId($notificationId, $notifications, $request->limit, $request->order);

        return NotificationResource::collection($notifications);
    }
}
