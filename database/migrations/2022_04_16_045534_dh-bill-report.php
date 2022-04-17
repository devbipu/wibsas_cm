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
        Schema::create('dh_bill_report', function(Blueprint $table){
            $table->bigincrements('id');
            $table->integer('client_id');
            $table->integer('software_install_id');
            $table->string('bill_gen_date')->nullable();
            $table->string('bill_pay_date');
            $table->string('bill_type');
            $table->integer('bill_amount');
            $table->integer('bill_status')->nullable()->comment('0 = Unpaid, 1 = Paid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dh_bill_report');
    }
};
