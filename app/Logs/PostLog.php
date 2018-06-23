<?php
namespace App\Logs;

use App\Logs\Log;
use App\Objects\PostJsonObject;
use App\Objects\UserJsonObject;
use App\Objects\KeyJsonObject;
use App\Objects\MerchantJsonObject;


class PostLog extends Log
{
    public $post;

    public function __construct($user, $post, $action, $api)
    {
        parent::__construct($user, $action, $api);
        $this->post = $post;
    }

    /**log
     * [
     *  {type: "key", data: "manage.log.merchant.create"}
     * ]
     */
    protected function format()
    {
        return json_encode([
            (new UserJsonObject($this->user))->toArray(),
            (new KeyJsonObject('manage.log.post.create'))->toArray(),
            (new PostJsonObject($this->post))->toArray()
        ]);
    }
}
