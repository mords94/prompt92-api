<?php

use App\Models\Email;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmailsUsersForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Email::getTableName(), function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on(User::getTableName());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Email::getTableName(), function (Blueprint $table) {
            $table->dropForeign('emails_user_id_foreign');
        });
    }
}
