<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpDepPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_dep_positions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id');
            $table->foreignId('department_id');
            $table->foreignId('position_id');
            $table->softDeletes();//delete_at
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emp_dep_positions');
    }
}

// id	BIGINT(20)	
// employee_id	BIGINT(20)	
// department_id	BIGINT(20)	
// position_id	BIGINT(20)	
// deleted_at	TIMESTAMP	NULL
// created_at	TIMESTAMP	CURRENT_TIMESTAMP()
// updated_at	TIMESTAMP	CURRENT_TIMESTAMP()
