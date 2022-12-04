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
        Schema::create('company_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_subgroup_id')->index();
            $table->unsignedInteger('company_group_head_id')->index();
            $table->text('name');
            $table->text('sector');
            $table->text('description');
            $table->timestamps();
            
            $table->foreign('company_subgroup_id')->references('id')
            ->on('company_groups')->onDelete('cascade');
        });
        
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_group_id')->index();
            $table->text('name');
            $table->text('specialized_sector');
            $table->text('description');
            $table->timestamps();

            $table->foreign('company_group_id')->references('id')
                    ->on('company_groups')->onDelete('cascade');
        });
        
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->index();
            $table->text('name');
            $table->string('address');
            $table->text('city');
            $table->text('country');
            $table->string('gps_cordinates');
            $table->text('description');
            $table->timestamps();

            $table->foreign('company_id')->references('id')
                    ->on('companies')->onDelete('cascade');
        });
        
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->index();
            $table->text('name');
            $table->text('type');
            $table->float('purchased_value');
            $table->integer('purchased_year');
            $table->text('description');
            $table->timestamps();
            
            $table->foreign('company_id')->references('id')
                    ->on('companies')->onDelete('cascade');
        });

        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->text('first_name');
            $table->text('last_name');
            $table->string('nic_no');
            $table->string('address');
            $table->text('city');
            $table->text('country');
            $table->string('contact');
            $table->timestamps();
        });
        
        Schema::create('managers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->index();
            $table->unsignedInteger('people_id')->index();
            $table->text('position');
            $table->text('department');
            $table->timestamps();
            
            $table->foreign('company_id')->references('id')
                    ->on('companies')->onDelete('cascade');
            $table->foreign('people_id')->references('id')
                    ->on('people')->onDelete('cascade');
        });
        
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_group_id')->index();
            $table->unsignedInteger('company_id')->index();
            $table->unsignedInteger('people_id')->index();
            $table->text('position');
            $table->text('department');
            $table->timestamps();

            $table->foreign('company_group_id')->references('id')
                    ->on('company_groups')->onDelete('cascade');
    
            $table->foreign('company_id')->references('id')
                    ->on('companies')->onDelete('cascade');

            $table->foreign('people_id')->references('id')
                    ->on('people')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
        Schema::dropIfExists('assets');
        Schema::dropIfExists('people');
        Schema::dropIfExists('managers');
        Schema::dropIfExists('employees');
        Schema::dropIfExists('companies');
        Schema::dropIfExists('company_groups');
    }
};
