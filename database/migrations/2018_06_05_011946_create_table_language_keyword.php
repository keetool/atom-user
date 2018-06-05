<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLanguageKeyword extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("keyword_language", function (Blueprint $table) {
            $table->uuid("keyword_id");
            $table->uuid("language_id");
            $table->text("content");
            $table->timestamps();
            $table->foreign("keyword_id")->references('id')->on("keywords");
            $table->foreign("language_id")->references('id')->on("languages");
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
