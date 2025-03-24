<?php

use App\Enums\SponsorAdPosition;
use App\Enums\SponsorAdSize;
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
        Schema::create('sponsor_ads', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->string('uploaded_video')->nullable();
            $table->boolean('status')->default(false);
            $table->enum('position', SponsorAdPosition::toArray())->nullable();
            $table->integer('countSponsorrate')->default(0);
            $table->enum('size', SponsorAdSize::toArray())->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('link')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sponsor_ads');
    }
};
