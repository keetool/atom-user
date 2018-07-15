<?php

namespace App\Http\Controllers\OpenApi;

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
use App\Services\SocketService;
use App\SocketEvent\Post\CreatePostSocketEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Post as PostResource;
use App\Http\Controllers\OpenApiController;
use Illuminate\Support\Facades\Mail;
use App\Repositories\UserRepository;
use App\Repositories\KeywordLanguageRepository;
use App\Repositories\KeywordRepository;
use App\Repositories\LanguageRepository;

/**
 * @resource Open post
 */
class PostApiController extends OpenApiController
{

    protected $postRepo;
    protected $userRepo;
    protected $imagePostRepository;
    protected $merchantRepo;
    protected $voteRepo;
    protected $socketService;
    protected $languageRepo;
    protected $keywordRepo;
    protected $keywordLanguageRepo;

    public function __construct(
        VoteRepositoryInterface $voteRepository,
        PostRepositoryInterface $postRepo,
        SocketService $socketService,
        ImagePostRepositoryInterface $imagePostRepository,
        MerchantRepository $merchantRepository,
        UserRepository $userRepo,
        LanguageRepository $languageRepo,
        KeywordRepository $keywordRepo,
        KeywordLanguageRepository $keywordLanguageRepo
    )
    {
        parent::__construct();
        $this->postRepo = $postRepo;
        $this->merchantRepo = $merchantRepository;
        $this->voteRepo = $voteRepository;
        $this->socketService = $socketService;
        $this->imagePostRepository = $imagePostRepository;
        $this->userRepo = $userRepo;
        $this->languageRepo = $languageRepo;
        $this->keywordRepo = $keywordRepo;
        $this->keywordLanguageRepo = $keywordLanguageRepo;
    }

    /**
     * Load post open api
     * param = {post_id}
     */
    public function loadPosts($subdomain, Request $request)
    {
        if ($this->merchantRepo->findBySubDomain($subdomain) == null)
            return $this->notFound(["message" => "merchant not found"]);

        $merchant = $this->merchantRepo->findBySubDomain($request->subDomain);

        $posts = $this->postRepo->loadByMerchantId($merchant->id, $request->post_id, $request->limit);
        return PostFullResource::collection($posts);
    }

    /**
     * Get post by id
     */
    public function getPost($subdomain, $postId, Request $request)
    {
        $post = $this->postRepo->show($postId);
        if ($post == null) {
            return $this->notFound([
                "message" => "post not found"
            ]);
        }

        return new PostFullResource($post);
    }

    public function test()
    {
        $language = $this->languageRepo->findByCode("vi-vn");
        $keywords = $this->keywordRepo->getAllKeyWord();
        $dataKeyword = [];
        foreach ($keywords as $keyword) {
            $dataKeyword[$keyword->name] = $this->keywordLanguageRepo->findByKeywordIdAndLanguageId($keyword->id, $language->id)->toArray();
        }
        $data['keyword'] = $dataKeyword;
        // dd($data);

        return view('email.test', $data);
        $id = "69b65fd2-433e-4ea8-ae92-39eccee28cde";
        $user = $this->userRepo->show($id);
        $subject = "askdk";


        Mail::send('email.test1', ['data' => $data], function ($m) use ($user, $subject) {
            $m->from("no-reply@colorme.vn", "colorMe");

            $m->to($user->email, $user->name)->subject($subject);
        });
    }
}
