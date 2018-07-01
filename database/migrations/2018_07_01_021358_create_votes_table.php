<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid("user_id");
            $table->integer("value")->default(0);
            $table->timestamps();
            $table->foreign("user_id")->references("id")->on("users");
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->integer("num_comments")->default(0);
        });
        Schema::create('comments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('value');
            $table->uuid("user_id");
            $table->uuid('post_id');
            $table->foreign("post_id")->references("id")->on("posts");
            $table->foreign("user_id")->references("id")->on("users");
            $table->timestamps();
        });
        DB::statement('ALTER TABLE votes ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
        DB::statement('ALTER TABLE comments ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
