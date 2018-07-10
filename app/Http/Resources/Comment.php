<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class Comment extends JsonResource
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
            "id" => $this->id,
            "value" => $this->value,
            'post_id' => $this->post_id,
            "vote" => $vote == null ? 0 : (int)$vote->value,
            "upvote" => $this->upvote,
            "downvote" => $this->downvote,
            "user" => new User($this->user),
            "updated_at" => strtotime($this->updated_at),
            "created_at" => strtotime($this->created_at)
        ];
    }
}
