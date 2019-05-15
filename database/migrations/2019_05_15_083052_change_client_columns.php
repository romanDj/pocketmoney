<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeClientColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client', function (Blueprint $table) {
            $table->string('name', 70)->nullable()->change();
            $table->string('surname', 70)->nullable()->change();
            $table->string('series', 50)->nullable()->change();
            $table->string('number', 50)->nullable()->change();
            $table->string('phone', 20)->nullable()->change();
            $table->string('address', 200)->nullable()->change();
            $table->date('dateOfIssues')->nullable()->change();
            $table->string('issued', 300)->nullable()->change();
            $table->date('dateOfBirth')->nullable()->change();
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
}
