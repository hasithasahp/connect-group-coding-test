<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAttendanceModule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('birthday');
            $table->string('nic_no');
            $table->timestamps();
        });

        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->string('address');
            $table->text('city');
            $table->text('country');
            $table->string('gps_cordinates');
            $table->timestamps();
        });

        Schema::create('shifts', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->time('starts_at');
            $table->time('ends_at');
            $table->boolean('is_full_shift');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('emp_id')->index();
            $table->unsignedInteger('loc_id')->index();
            $table->unsignedInteger('shift_id')->index();
            $table->date('shift_date');
            $table->text('description');
            $table->timestamps();

            $table->foreign('emp_id')
                ->references('id')   
                ->on('employees');

            $table->foreign('loc_id')
                ->references('id')
                ->on('locations');

            $table->foreign('shift_id')
                ->references('id')
                ->on('shifts');
        });

        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('schedule_id')->index();
            $table->unsignedInteger('emp_id')->index();
            $table->dateTime('checkin_at');
            $table->dateTime('checkout_at');
            $table->decimal('worked_hours');
            $table->timestamps();

            $table->foreign('emp_id')
                ->references('id')
                ->on('employees');

            $table->foreign('schedule_id')
                ->references('id')
                ->on('schedules');
        });

        Schema::create('attendance_faults', function (Blueprint $table) {
            $table->increments('id');    
            $table->unsignedInteger('attendance_id')->index();
            $table->unsignedInteger('emp_id')->index();
            $table->dateTime('checkin_correction_at');
            $table->dateTime('checkout_correction_at');
            $table->decimal('corrected_hours');
            $table->string('remark');
            $table->timestamps();

            $table->foreign('emp_id')
                ->references('id')
                ->on('employees');

            $table->foreign('attendance_id')
                ->references('id')
                ->on('attendances');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schedules', function(Blueprint $table) {
            $table->dropForeign([ 'emp_id' ]);
            $table->dropForeign([ 'loc_id' ]);
            $table->dropForeign([ 'shift_id' ]);
        });
        
        Schema::table('attendances', function(Blueprint $table) {
            $table->dropForeign([ 'emp_id' ]);
            $table->dropForeign([ 'schedule_id' ]);
        });

        Schema::table('attendance_faults', function(Blueprint $table) {
            $table->dropForeign([ 'emp_id' ]);
            $table->dropForeign([ 'attendance_id' ]);
        });

        Schema::dropIfExists('employees');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('shifts');
        Schema::dropIfExists('schedules');
        Schema::dropIfExists('attendances');
        Schema::dropIfExists('attendance_faults');
    }
}
