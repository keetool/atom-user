<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPrimaryKeyKeywordLanguageAndFlag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("keyword_language", function (Blueprint $table) {
            $table->uuid('id')->primary();
        });
        DB::statement('ALTER TABLE keyword_language ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
        Schema::table("languages", function (Blueprint $table) {
            $table->string("flag_url")->nullable();
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
