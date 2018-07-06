<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_votes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('value');
            $table->uuid("user_id");
            $table->uuid('comment_id');
            $table->foreign("comment_id")->references("id")->on("comments");
            $table->foreign("user_id")->references("id")->on("users");
            $table->timestamps();
            $table->unique(['user_id', 'comment_id']);
        });
        DB::statement('ALTER TABLE comment_votes ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_votes');
    }
}
