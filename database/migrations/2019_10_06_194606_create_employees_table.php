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
            $table->bigIncrements('id');
            $table->string('emp_name');
            $table->text('presentaddress');           
            $table->text('permanentaddress');
             $table->string('image')->nullable()->default('deafault.png');
            $table->string('phone');
            $table->string('email')->nullable()->unique();
             $table->string('nid')->unique();
             $table->integer('age');
             $table->integer('salary');
             $table->integer('deg_id');
             $table->string('education');            
             $table->string('marital_status');            
             $table->integer('per_day')->nullable();            
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
}
