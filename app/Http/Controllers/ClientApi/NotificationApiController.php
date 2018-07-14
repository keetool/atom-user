<?php

namespace App\Http\Controllers\ClientApi;

use App\Http\Controllers\ApiController;
use App\Http\Resources\NotificationResource;
use App\Notification;
use App\Repositories\NotificationRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * Get notifications by user and merchant
     * @param $subDomain
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getNotificationByMerchant($subDomain, Request $request)
    {
        $user = Auth::user();

        $notifications = $this->notificationRepository
            ->findNotificationByReceiverIdAndMerchantIdPaginate($user->id, $request->merchant->id,
                $request->order, $request->limit);

        return NotificationResource::collection($notifications);
    }

    /**
     * @param $notificationId
     * @return \Illuminate\Http\JsonResponse
     */
    public function seenNotificationMerchant($subDomain, $notificationId)
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

    /***
     * Get notification after by user
     * if no id, act as normal
     * @param $subDomain
     * @param null $notificationId
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getNotificationsAfter($subDomain, $notificationId = null, Request $request)
    {
        $user = Auth::user();

        if ($notificationId) {
            $notifications = Notification::where("receiver_id", $user->id);
            $notifications = $this->notificationRepository->loadAfterModelId($notificationId, $notifications, $request->limit, $request->order);
        } else {
            $notifications = $this->notificationRepository->findNotificationByReceiverIdPaginate($user->id, $request->order, $request->limit);
        }

        return NotificationResource::collection($notifications);
    }

    /***
     * Get notification after by user and merchant
     * if no id, act as normal
     * @param $subDomain
     * @param null $notificationId
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getNotificationsMerchantAfter($subDomain, $notificationId = null, Request $request)
    {
        $user = Auth::user();

        if ($notificationId) {
            $notifications = Notification::where("receiver_id", $user->id)->where("merchant_id", $request->merchant->id);
            $notifications = $this->notificationRepository->loadAfterModelId($notificationId, $notifications, $request->limit, $request->order);
        } else {
            $notifications = $this->notificationRepository->findNotificationByReceiverIdAndMerchantIdPaginate($user->id, $request->merchant->id, $request->order, $request->limit);
        }

        return NotificationResource::collection($notifications);
    }

}
