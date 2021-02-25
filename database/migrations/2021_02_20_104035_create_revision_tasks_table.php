<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisionTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revision_tasks', function (Blueprint $table) {
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
            $table->string('solution_format'); 
            $table->string('payment_status')->nullable();  
            $table->string('penalties_awarded')->nullable();  
            $table->string('submission_date'); 
            $table->string('final_document')->nullable(); 
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
        Schema::dropIfExists('revision_tasks');
    }
}
