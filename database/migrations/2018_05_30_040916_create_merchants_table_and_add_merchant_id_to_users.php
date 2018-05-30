<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantsTableAndAddMerchantIdToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("merchants", function (Blueprint $table) {
            $table->increments("id");
            $table->string("name");
            $table->string("sub_domain");
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table("users", function (Blueprint $table) {
            $table->integer("merchant_id")->unsigned();
            $table->boolean("is_root")->default("false");
            $table->foreign("merchant_id")->references("id")->on("merchants");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("merchants");
        Schema::table("users", function (Blueprint $table) {
            $table->dropForeign(["merchant_id"]);
            $table->dropColumn("merchant_id");
            $talbe->dropColumn("is_root");
        });
    }
}
