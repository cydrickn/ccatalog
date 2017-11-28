<?php namespace Cyd293\CCatalog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTagsTable extends Migration
{
    public function up()
    {
        Schema::create('cyd293_ccatalog_tags', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('tag_id');
            $table->string('tag_name');
            $table->string('tag_slug')->unique();
            
            $table->timestamp('tag_created_at')->nullable();
            $table->timestamp('tag_updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cyd293_ccatalog_tags');
    }
}
