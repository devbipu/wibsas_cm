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
        Schema::create('clients_services', function(Blueprint $table){
            $table->bigincrements('id');
            $table->string('client_id');
            $table->string('service_type');
            $table->string('app_install_id');
            $table->string('app_url');
            $table->string('app_username');
            $table->string('app_password');
            $table->string('app_install_date');
            $table->string('installment_date');
            $table->string('installment_charge');
            $table->string('bill_pay_type');
            $table->string('bill_type_charge');
            $table->string('billing_date');
            $table->string('payment_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients_services');
    }
};
