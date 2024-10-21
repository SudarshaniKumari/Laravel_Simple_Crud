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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('emp_no',7)->unique();
            $table->string('emp_fname');
            $table->string('emp_lname');
            $table->string('job_name');
            $table->date('hiredate');
            $table->string('email')->unique();
            $table->string('phonenumber');
            $table->string('dep_no'); // Foreign key from departments table
            $table->foreign('dep_no')->references('dep_no')->on('departments')->onDelete('cascade');
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
        Schema::dropIfExists('employees');
    }
};
