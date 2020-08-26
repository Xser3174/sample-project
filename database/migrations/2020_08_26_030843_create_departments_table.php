<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('department_name','255')->nullable();
            $table->softDeletes();//delete_at
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    // id	BIGINT(20)	
    // department_name	VARCHAR(255)	
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
        Schema::dropIfExists('departments');
    }
}
