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
        Schema::create('soft_install_per_client', function(Blueprint $table){
            $table->bigincrements('id');
            $table->string('client_id');
            $table->string('business_name');
            $table->string('business_address')->nullable();
            $table->string('service_type');
            $table->string('app_install_id');
            $table->string('app_url');
            $table->string('app_username');
            $table->string('app_password');
            $table->string('app_install_date');
            $table->string('app_rafaral')->nullable();
            $table->string('rafared_agents')->nullable();
            $table->string('hosted_by');
            $table->string('domain_by');
            $table->string('domain_hosting_bill_type')->nullable();
            $table->integer('domain_hosting_bill')->nullable();
            $table->string('bill_starting_date')->nullable();
            $table->integer('soft_price');
            $table->integer('installation_charge');
            $table->string('service_level_aggre');
            $table->integer('service_level_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
