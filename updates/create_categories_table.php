<?php namespace Cyd293\CCatalog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('cyd293_ccatalog_categories', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('category_id');
            $table->string('category_name');
            $table->string('category_slug')->unique();
            $table->integer('category_parent_id')->nullable();
            $table->boolean('category_displayed')->default(1);
            $table->longText('category_description');
            $table->longText('category_content');

            $table->string('category_thumbnail')->nullable();
            $table->string('category_banner')->nullable();

            $table->string('category_meta_title')->default('');
            $table->text('category_meta_keywords')->nullable();
            $table->string('category_meta_description')->default('');

            $table->timestamp('category_created_at')->nullable();
            $table->timestamp('category_updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cyd293_ccatalog_categories');
    }
}
