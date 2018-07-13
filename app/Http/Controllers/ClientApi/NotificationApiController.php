<?php

namespace App\Http\Controllers\ClientApi;

use App\Notification;

use App\Repositories\NotificationRepository;
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

    /**
     * @param $notificationId
     * @return \Illuminate\Http\JsonResponse
     */
    public function seenNotification($subDomain, $notificationId)
    {
        $noti = Notification::find($notificationId);

        if ($noti == null) {
            return $this->badRequest(["message" => "Notification not found!"]);
        }

        $this->notificationRepository->update(["status" => \App\Notifications\Notification::SEEN], $notificationId);

        return $this->success([
            "message" => "Seen"
        ]);
    }

    public function getNotificationsAfter($subDomain, $notificationId, Request $request)
    {
        $user = Auth::user();

        $notifications = Notification::where("receiver_id", $user->id);

        $notifications = $this->notificationRepository->loadAfterModelId($notificationId, $notifications, $request->limit, $request->order);

        return NotificationResource::collection($notifications);

    }
}
