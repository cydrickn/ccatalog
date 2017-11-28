<?php namespace Cyd293\CCatalog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class Migration103 extends Migration
{
    public function up()
    {
        Schema::table('cyd293_ccatalog_products', function($table)
        {
            $table->string('product_meta_title');
            $table->text('product_meta_keywords');
            $table->longText('product_meta_description');
        });
    }
    
    public function down()
    {
        Schema::table('cyd293_ccatalog_products', function($table)
        {
            $table->dropColumn('product_meta_title');
            $table->dropColumn('product_meta_keywords');
            $table->dropColumn('product_meta_description');
        });
    }
}