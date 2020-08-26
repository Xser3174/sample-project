<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('position_name','255');
            $table->integer('position_rank');
            $table->softDeletes();//delete_at
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    // id	BIGINT(20)	
    // position_name	VARCHAR(255)	
    // position_rank	INT(11)	
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
        Schema::dropIfExists('positions');
    }
}
