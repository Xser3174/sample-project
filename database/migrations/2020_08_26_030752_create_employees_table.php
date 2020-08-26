<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
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
            $table->string('employee_name','255');
            $table->string('email','255')->nullable();
            $table->date('dob')->nullable();
            $table->string('password','255');
            $table->integer('gender')->nullable()->default()->comment('1:Male 2:Female');
            $table->softDeletes();//delete_at
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    // id	BIGINT(20)	
    // employee_name	VARCHAR(255)	
    // email	VARCHAR(255)	NULL
    // dob	DATE	NULL
    // password	VARCHAR(255)	
    // gender	INT(11)	1
    // deleted_at	TIMESTAMP	NULL
    // created_at	TIMESTAMP	CURRENT_TIMESTAMP()
    // updated_at	TIMESTAMP	CURRENT_TIMESTAMP()
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
