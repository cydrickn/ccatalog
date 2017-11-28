<?php namespace Cyd293\CCatalog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateBrandsTable extends Migration
{
    public function up()
    {
        Schema::create('cyd293_ccatalog_brands', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('brand_id');
            $table->string('brand_name')->unique();
            $table->string('brand_slug')->unique();
            $table->longText('brand_short_description');
            $table->longText('brand_description');
            $table->string('brand_logo')->nullable();

            $table->timestamp('brand_created_at')->nullable();
            $table->timestamp('brand_updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cyd293_ccatalog_brands');
    }
}
