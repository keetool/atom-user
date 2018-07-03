<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 6/23/18
 * Time: 8:52 AM
 */

namespace App\Logs\Post;

use App\Logs\LogFactory;

class PostLogFactory extends LogFactory
{
    protected $post;

    private static $createInstance = null;
    private static $editInstance = null;
    private static $deleteInstance = null;


    function __construct($api, $user, $post, $action)
    {
        parent::__construct($action, $api, $user);
        $this->post = $post;
    }

    public static function getCreateInstance($api, $user, $post)
    {
        if (PostLogFactory::$createInstance == null) {
            PostLogFactory::$createInstance = new PostLogFactory($api, $user, $post, "manage.action.post.create");
        }
        return PostLogFactory::$createInstance;
    }

    public static function getEditInstance($api, $user, $post) {
        if (PostLogFactory::$editInstance == null) {
            PostLogFactory::$editInstance = new PostLogFactory($api, $user, $post, "manage.action.post.edit");
        }
        return PostLogFactory::$editInstance;
    }

    public static function getDeleteInstance($api, $user, $post) {
        if (PostLogFactory::$deleteInstance == null) {
            PostLogFactory::$deleteInstance = new PostLogFactory($api, $user, $post, "manage.action.post.delete");
        }
        return PostLogFactory::$deleteInstance;
    }


    public function makeLog()
    {
        return new PostLog($this->user, $this->post, $this->action, $this->api);
    }
}