<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("images", function (Blueprint $table) {
            $table->primary("id");
        });
        Schema::create('image_post', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid("image_id");
            $table->uuid("post_id");
            $table->timestamps();
            $table->foreign("image_id")->references('id')->on("images");
            $table->foreign("post_id")->references('id')->on("posts");
        });
        DB::statement('ALTER TABLE image_post ALTER COLUMN id SET DEFAULT uuid_generate_v4();');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_post');
    }
}
