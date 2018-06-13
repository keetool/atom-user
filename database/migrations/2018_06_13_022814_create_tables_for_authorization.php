<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesForAuthorization extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("packages", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("keyword");
            $table->string("key");
            $table->timestamps();
        });
        DB::statement('ALTER TABLE packages ALTER COLUMN id SET DEFAULT uuid_generate_v4();');

        Schema::create("actions", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("name");
            $table->string("keyword");
            $table->text("permission");
            $table->enum("type", ["system", "merchant"]);
            $table->timestamps();
        });
        DB::statement('ALTER TABLE actions ALTER COLUMN id SET DEFAULT uuid_generate_v4();');

        Schema::create("action_package", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->uuid("action_id");
            $table->uuid("package_id");
            $table->timestamps();
            $table->foreign("action_id")->references("actions")->on("id");
            $table->foreign("package_id")->references("packages")->on("id");
        });
        DB::statement('ALTER TABLE action_package ALTER COLUMN id SET DEFAULT uuid_generate_v4();');

        Schema::create("merchant_package", function (Blueprint $table) {
            $table->uuid("id");
            $table->uuid("merchant_id");
            $table->uuid("package_id");
            $table->foreign("merchant_id")->references("merchants")->on("id");
            $table->foreign("package_id")->references("packages")->on("id");
            $table->timestamps();
        });
        DB::statement('ALTER TABLE merchant_package ALTER COLUMN id SET DEFAULT uuid_generate_v4();');

        Schema::create("action_merchant", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->uuid("action_id");
            $table->uuid("merchant_id");
            $table->foreign("action_id")->references("actions")->on("id");
            $table->foreign("merchant_id")->references("merchants")->on("id");
            $table->timestamps();
        });
        DB::statement('ALTER TABLE action_merchant ALTER COLUMN id SET DEFAULT uuid_generate_v4();');

        Schema::create("tabs", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->uuid("parent_id")->index();
            $table->integer("order")->unsigned();
            $table->string("name");
            $table->string("keyword");
            $table->string("url");
            $table->timestamps();
        });
        DB::statement('ALTER TABLE tabs ALTER COLUMN id SET DEFAULT uuid_generate_v4();');

        Schema::create("roles", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("name");
            $table->uuid("merchant_id");
            $table->boolean("deletable");
            $table->timestamps();
            $table->foreign("merchant_id")->references("id")->on("merchants");
        });
        DB::statement('ALTER TABLE roles ALTER COLUMN id SET DEFAULT uuid_generate_v4();');


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
