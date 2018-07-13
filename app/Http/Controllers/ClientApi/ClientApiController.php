<?php

namespace App\Http\Controllers\ClientApi;

use App\Http\Resources\PostFullResource;
use App\Logs\Log;
use App\Logs\Post\PostLogFactory;
use App\Notifications\Notification;
use App\Notifications\Post\CreateDownvotePostNotification;
use App\Notifications\Post\CreateUpvotePostNotification;
use App\Repositories\ImagePostRepositoryInterface;
use App\Repositories\MerchantRepository;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\VoteRepositoryInterface;
use App\Services\SocketServiceInterface;
use App\SocketEvent\Post\CreatePostSocketEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Post as PostResource;

/**
 * @resource Client
 */
class ClientApiController extends ApiController
{

    protected $postRepo;
    protected $imagePostRepository;
    protected $merchantRepo;
    protected $voteRepo;
    protected $socketService;

    public function __construct(
        VoteRepositoryInterface $voteRepository,
        PostRepositoryInterface $postRepo,
        SocketServiceInterface $socketService,
        ImagePostRepositoryInterface $imagePostRepository,
        MerchantRepository $merchantRepository
    ) {
        parent::__construct();
        $this->postRepo = $postRepo;
        $this->merchantRepo = $merchantRepository;
        $this->voteRepo = $voteRepository;
        $this->socketService = $socketService;
        $this->imagePostRepository = $imagePostRepository;
    }

    /** 
     * Search
     * param = {search, post_id} 
     */
    public function search($subDomain, Request $request)
    {
        $search = $request->search;
        $merchant = $this->merchantRepo->findBySubDomain($request->subDomain);

        return $this->success(["posts" => PostFullResource::collection($this->postRepo->searchByMerchantId($merchant->id, $search, $request->post_id))]);
    }
}
