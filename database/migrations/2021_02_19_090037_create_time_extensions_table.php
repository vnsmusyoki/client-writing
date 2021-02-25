<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeExtensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_extensions', function (Blueprint $table) {
            $table->id();
            $table->string('task_id');
            $table->string('client_id');
            $table->string('client_email');
            $table->string('writer_id');
            $table->string('writer_email');
            $table->string('current_deadline');
            $table->string('client_amount');
            $table->string('writer_amount');
            $table->string('time_requested');
            $table->string('date_assigned');
            $table->string('new_deadline')->nullable();
            $table->string('client_comment')->nullable();
            $table->string('admin_comment')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('time_extensions');
    }
}
