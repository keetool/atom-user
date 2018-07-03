<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("images", function (Blueprint $table) {
            $table->uuid("id");
            $table->string("url");
            $table->string("path");
            $table->uuid('merchant_id');
            $table->uuid("user_id");
            $table->timestamps();
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("merchant_id")->references("id")->on("merchants");
        });
        DB::statement('ALTER TABLE images ALTER COLUMN id SET DEFAULT uuid_generate_v4();');

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
