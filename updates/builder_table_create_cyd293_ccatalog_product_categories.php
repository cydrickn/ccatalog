<?php namespace Cyd293\CCatalog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCyd293CcatalogProductCategories extends Migration
{
    public function up()
    {
        Schema::create('cyd293_ccatalog_product_categories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('product_id');
            $table->integer('category_id');
            
            $table->primary(['product_id','category_id'], 'ct_pk');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('cyd293_ccatalog_product_categories');
    }
}