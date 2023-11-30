<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            //
            $table->text('allergies')->nullable();
            $table->text('current_medication')->nullable();
            $table->text('conditions')->nullable();
            $table->text('insurances')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            //
            $table->dropColumn('allergies');
            $table->dropColumn('current_medication');
            $table->dropColumn('conditions');
            $table->dropColumn('insurances');
        });
    }
}
