<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Action;

class CreateUserAction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Action::createMany([
            [
                "name" => "user.create",
                "keyword" => "manage.action.user.create",
                "permission" => json_encode([
                    "effect" => "allow",
                    "actions" => ["user.create"],
                    "resources" => ["db:user:*:*"]
                ]),
                "type" => "system"
            ],
            [
                "name" => "user.view",
                "keyword" => "manage.action.user.view",
                "permission" => json_encode([
                    "effect" => "allow",
                    "actions" => ["user.view"],
                    "resources" => ["db:user:*:*"]
                ]),
                "type" => "system"
            ],
            [
                "name" => "user.update",
                "keyword" => "manage.action.user.update",
                "permission" => json_encode([
                    "effect" => "allow",
                    "actions" => ["user.update"],
                    "resources" => ["db:user:*:*"]
                ]),
                "type" => "system"
            ],
            [
                "name" => "user.delete",
                "keyword" => "manage.action.user.delete",
                "permission" => json_encode([
                    "effect" => "allow",
                    "actions" => ["user.delete"],
                    "resources" => ["db:user:*:*"]
                ]),
                "type" => "system"
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
