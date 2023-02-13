<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conges_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_LeaveApplication');
            $table->string('employee_number');
            $table->foreign('id_LeaveApplication')->references('id')->on('LeaveApplication')->onDelete('cascade');
            //$table->string('conges_reason')->nullable();
            ///$table->date('conges_date')->nullable();
            $table->string('leavelists',999);//**services**//
            $table->string('products',50);//**Equipes**//
           // $table->date('start_date');
            //$table->date('end_date');
            //$table->float('paid_days');
            //$table->float('total_days');
            //$table->float('unpaid_days');
            //$table->string('half_day');
           // $table->float('remaining_days');
           // $table->date('reprise_date');
            $table->string('status',50)->default('pending');
            $table->integer('value_status');
            $table->date('status_date')->nullable();
            $table->text('note')->nullable();
            $table->string('user',300);
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
        Schema::dropIfExists('conges_details');
    }
};
