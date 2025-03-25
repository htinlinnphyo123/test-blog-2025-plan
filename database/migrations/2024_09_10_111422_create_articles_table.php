<?php

use App\Enums\ArticleType;
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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->enum('type',ArticleType::toArray())->default('default');
            $table->foreignId('category_id')->constrained();
            $table->foreignId('subcategory_id')->nullable()->constrained();
            $table->date('date')->nullable();
            $table->boolean('is_published')->default(0);

            $table->string('thumbnail')->nullable();
            $table->text('link')->nullable();
            $table->unsignedBigInteger('written_by')->nullable();
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
        Schema::dropIfExists('articles');
    }
};
