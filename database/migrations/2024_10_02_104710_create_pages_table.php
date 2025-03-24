<?php

use App\Enums\ArticleType;
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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('title_other')->nullable();
            $table->text('description')->nullable();
            $table->text('description_other')->nullable();
            $table->enum('type',ArticleType::toArray())->default('default');
            $table->date('date')->nullable();
            $table->boolean('is_published')->default(0);
            $table->boolean('is_highlighed')->default(0);
            $table->boolean('is_banner')->default(0);
            $table->string('thumbnail')->nullable();
            $table->text('link')->nullable();
            $table->unsignedBigInteger('written_by')->nullable();
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
        Schema::dropIfExists('pages');
    }
};
