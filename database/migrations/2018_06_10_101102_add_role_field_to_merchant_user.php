<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoleFieldToMerchantUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("merchant_user", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->enum("role",['student', 'root', 'employee']);
        });
        DB::statement('ALTER TABLE merchant_user ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
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
