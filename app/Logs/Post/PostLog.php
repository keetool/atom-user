<?php
namespace App\Logs\Post;

use App\Logs\Log;
use App\Objects\PostJsonObject;
use App\Objects\UserJsonObject;
use App\Objects\KeyJsonObject;


class PostLog extends Log
{
    public $post;

    public function __construct($user, $post, $action, $api)
    {
        parent::__construct($user, $action, $api);
        $this->post = $post;
    }

    protected function format()
    {
        return json_encode([
            (new UserJsonObject($this->user))->toArray(),
            (new KeyJsonObject($this->action))->toArray(),
            (new PostJsonObject($this->post))->toArray()
        ]);
    }
}
