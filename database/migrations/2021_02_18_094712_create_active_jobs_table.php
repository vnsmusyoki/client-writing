<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActiveJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('active_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('client_id');
            $table->string('client_email');
            $table->string('writer_id');
            $table->string('writer_email');
            $table->string('task_category');
            $table->string('bid_amount'); 
            $table->string('task_amount'); 
            $table->string('task_status'); 
            $table->string('client_remarks'); 
            $table->string('payment_status'); 
            $table->string('penalties_awarded'); 
            $table->string('submission_date'); 
            $table->string('final_document'); 
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
        Schema::dropIfExists('active_jobs');
    }
}
