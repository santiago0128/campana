<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('sys.procesos');
        Schema::create('sys.procesos', function (Blueprint $table) {
            $schema_table = DB::table('sys.schema_procesos')->get();
            $table->id();
            for ($i=0; $i < count($schema_table) ; $i++) { 
                $table->string($schema_table[$i]->nombre);
            }
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys.procesos');
    }
};
