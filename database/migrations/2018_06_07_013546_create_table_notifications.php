<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNotifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("notifications", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->text("detail");
            $table->string("title");
            $table->string("image_url");
            $table->string("action_app");
            $table->string("action_web");
            $table->string("status");
            $table->timestamps();
        });
        DB::statement('ALTER TABLE notifications ALTER COLUMN id SET DEFAULT uuid_generate_v4();');

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
