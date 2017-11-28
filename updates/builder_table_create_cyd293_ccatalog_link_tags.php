<?php namespace Cyd293\CCatalog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCyd293CcatalogLinkTags extends Migration
{
    public function up()
    {
        Schema::create('cyd293_ccatalog_link_tags', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('tag_id');
            $table->integer('taggable_id');
            $table->string('taggable_type');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('cyd293_ccatalog_link_tags');
    }
}
