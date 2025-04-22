<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
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
        Schema::create('users', static function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->string('password', 100);
            $table->string('email', 100)->nullable()->unique();
            $table->dateTime('email_verified_at')->nullable();
            $table->boolean('active')->nullable()->default(false);
            // Corrected foreign key definitions
            $table->unsignedBigInteger('config_id')->nullable();
            $table->unsignedBigInteger('user_group_id')->nullable();
            
            $table->text('avatar')->nullable();
            $table->string('foto', 100)->nullable()->default('kuser.png');
            $table->timestamps();
            $table->rememberToken();
        
            // Add foreign key constraints separately
            $table->foreign('config_id')
                  ->references('id')
                  ->on('configs')
                  ->onDelete('set null');
                  
            $table->foreign('user_group_id')
                  ->references('id')
                  ->on('user_groups')
                  ->onDelete('set null');
        });
        User::create(['name' => 'admin','email' => 'admin@themesbrand.com','password' => Hash::make('12345678'),'email_verified_at'=>'2022-01-02 17:04:58','avatar' => 'avatar-1.jpg','created_at' => now(),]);
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