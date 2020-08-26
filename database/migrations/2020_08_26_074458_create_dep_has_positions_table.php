<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepHasPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dep_has_positions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id');
            $table->foreignId('position_id');       
            $table->softDeletes();//delete_at
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            
        });
    }
// id	BIGINT(20)	
// department_id	BIGINT(20)	
// position_id	BIGINT(20)	
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
        Schema::dropIfExists('dep_has_positions');
    }
}
