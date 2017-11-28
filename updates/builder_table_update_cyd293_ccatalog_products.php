<?php namespace Cyd293\CCatalog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCyd293CcatalogProducts extends Migration
{
    public function up()
    {
        Schema::table('cyd293_ccatalog_products', function($table)
        {
            $table->string('product_preview_image');
            $table->text('product_images');
        });
    }
    
    public function down()
    {
        Schema::table('cyd293_ccatalog_products', function($table)
        {
            $table->dropColumn('product_preview_image');
            $table->dropColumn('product_images');
        });
    }
}
