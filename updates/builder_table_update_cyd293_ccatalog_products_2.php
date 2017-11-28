<?php namespace Cyd293\CCatalog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCyd293CcatalogProducts2 extends Migration
{
    public function up()
    {
        Schema::table('cyd293_ccatalog_products', function($table)
        {
            $table->decimal('product_price', 60, 10)->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('cyd293_ccatalog_products', function($table)
        {
            $table->dropColumn('product_price');
        });
    }
}
