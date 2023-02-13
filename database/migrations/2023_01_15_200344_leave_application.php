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
        Schema::create('LeaveApplication', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_number');
            $table->date('conges_date')->nullable();
            //$table->enum('type', ['paid', 'unpaid'])->default('paid');
            $table->string('products');////products///**equipe**
            $table->bigInteger ('leavelists_id')->unsigned();
            $table->foreign('leavelists_id')->references('id')->on('leavelists')->onDelete('cascade');          
            $table->string('reason');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('half_day')->nullable();
            $table->float('total_days');
            $table->float('unpaid_days');
            $table->decimal('total',8,2);
            $table->date('reprise_date');
            $table->string('status',50)->default('pending');
            $table->integer('value_status');
            $table->text('note')->nullable();
            $table->date('status_date')->nullable();
            $table->string('user');
            $table->softDeletes();
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
        Schema::dropIfExists('LeaveApplication');
    }
};
