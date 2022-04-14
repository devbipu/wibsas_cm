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
            $table->string('product_type');
            $table->string('product_install_id');
            $table->string('product_url');
            $table->string('product_username');
            $table->string('product_password');
            $table->string('product_install_date');
            $table->string('product_rafaral')->nullable();
            $table->string('rafared_agents')->nullable();
            $table->integer('agent_id')->nullable();
            $table->string('hosted_by');
            $table->string('domain_by');
            $table->string('domain_hosting_bill_type')->nullable();
            $table->integer('domain_hosting_bill')->nullable();
            $table->integer('dh_bill_status')->default(0)->nullable()->comment('0 = un paid, 1 = paid, 2 = pending');
            $table->string('dh_bill_starting_date')->nullable();
            $table->integer('soft_price');
            $table->integer('installation_charge');
            $table->integer('install_bill_status')->default(0)->nullable()->comment('0 = un paid, 1 = paid, 2 = pending');
            $table->string('service_level_aggre');
            $table->integer('service_level_amount')->nullable();
            $table->string('sla_bill_start_date')->nullable();
            $table->integer('sla_bill_status')->default(0)->nullable()->comment('0 = un paid, 1 = paid, 2 = pending');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('soft_install_per_client' );
    }
};
