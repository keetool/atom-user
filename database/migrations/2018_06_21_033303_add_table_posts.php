<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTablePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create("posts", function (Blueprint $table){
            $table->uuid("id")->primary();
            $table->string("title");
            $table->text("body");
            $table->integer("upvote")->default(0);
            $table->integer("downvote")->default(0);
            $table->uuid("merchant_id");
            $table->timestamps();
            $table->uuid("creator_id");
            $table->foreign("merchant_id")->references("id")->on("merchants");
            $table->foreign("creator_id")->references("id")->on("users");
        });
        DB::statement('ALTER TABLE posts ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
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
