<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUserMerchant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("users", function (Blueprint $table) {
            $table->dropForeign(["merchant_id"]);
            $table->dropColumn("merchant_id");
        });
        Schema::create("merchant_user", function (Blueprint $table) {
            $table->uuid("merchant_id");
            $table->uuid("user_id");
            $table->foreign("merchant_id")->references("id")->on("merchants");
            $table->foreign("user_id")->references("id")->on("users");
        });
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
