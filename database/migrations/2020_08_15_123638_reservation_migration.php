<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReservationMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_reservation', function(Blueprint $table) {
            $table->bigIncrements('request_form_no');
            $table->date('date_request_occupy');
            $table->enum('time_request_occupy', ['am', 'pm', 'whole_day']);
            $table->text('request_use_facilities');
            $table->char('requested_group');
            $table->text('requested_group_contact');
            $table->text('requested_group_email');
            $table->integer('people_count');
            $table->text('reserve_purpose');
            $table->char('reserve_status');
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
        Schema::drop('tbl_reservation');
    }
}
