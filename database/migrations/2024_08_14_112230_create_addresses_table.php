<?php

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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('level1_code')->nullable();
            $table->string('level1_name')->nullable();
            $table->string('level2_code')->nullable();
            $table->string('level2_name')->nullable();
            $table->string('level3_code')->nullable();
            $table->string('level3_name')->nullable();
            $table->string('level4_code')->nullable();
            $table->string('level4_name')->nullable();
            $table->string('level5_code')->nullable();
            $table->string('level5_name')->nullable();
            $table->string('level6_code')->nullable();
            $table->string('level6_name')->nullable();
            $table->string('level7_code')->nullable();
            $table->string('level7_name')->nullable();
            $table->foreignId('country_id')->constrained()->nullable();           
            $table->string('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('addresses');
    }
};
