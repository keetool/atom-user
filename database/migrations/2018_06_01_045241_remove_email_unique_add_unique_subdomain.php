<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveEmailUniqueAddUniqueSubdomain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['email']);
            $table->index("email");
        });
        Schema::table("merchants", function (Blueprint $table) {
            $table->index("sub_domain");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(["email"]);
        });
        Schema::table("merchants", function (Blueprint $table) {
            $table->dropIndex(["sub_domain"]);
        });
    }
}
