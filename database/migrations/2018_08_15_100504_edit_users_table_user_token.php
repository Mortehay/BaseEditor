<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditUsersTableUserToken extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->string('active_token',100)->nullable();
            $table->string('user_token',100)->nullable();
            $table->text('token')->nullable();
            $table->text('api_token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('active_token');
            $table->dropColumn('user_token');
            $table->dropColumn('token');
            $table->dropColumn('api_token');
        });
    }
}
