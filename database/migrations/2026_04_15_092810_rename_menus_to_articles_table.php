<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            //
        });
        Schema::rename('menus', 'articles');
        Schema::rename('category_menu', 'article_category');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            //
        });
        Schema::rename('articles', 'menus');
        Schema::rename('article_category', 'category_menu');
    }
};
