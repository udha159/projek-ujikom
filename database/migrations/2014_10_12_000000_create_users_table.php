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
            $table->string('nama_lengkap')->nullable();
            $table->string('no_telepon')->nullable();
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->text('alamat')->nullable();
            $table->text('bio')->nullable();
            $table->text('tgl_lahir')->nullable();
            $table->enum('status_user', ['Active', 'non Active'])->default('Active');
            $table->string('pictures')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
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
