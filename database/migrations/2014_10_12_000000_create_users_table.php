<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // $table->string('name');
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('kode', 25);
            $table->char('nis' , 20);
            $table->string('fullname' , 125);
            $table->string('username');
            $table->string('password' , 50);
            $table->string('kelas' , 50);
            $table->text('alamat');
            $table->string('verif' , 50)->nullable();
            $table->enum('role', ['admin' , 'user']);
            $table->dateTime('join_date');
            $table->dateTime('terakhir_login');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
