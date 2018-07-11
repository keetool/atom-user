<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Merchant as MerchantResource;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\Auth;

class Post extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $user = Auth::user();

        if ($user)
            $vote = $this->votes()->where("user_id", $user->id)->first();
        else
            $vote = null;

        return [
            'id' => $this->id,
//            'body' => $this->body,
            'downvote' => $this->downvote,
            "upvote" => $this->upvote,
            'num_comments' => $this->num_comments,
            "creator" => new UserResource($this->user),
            "merchant" => new MerchantResource($this->merchant),
            'created_at' => strtotime($this->created_at),
            'updated_at' => strtotime($this->updated_at),
            "vote" => $vote == null ? 0 : $vote->value,
            "images" => ImageResource::collection($this->images),
        ];
    }
}
