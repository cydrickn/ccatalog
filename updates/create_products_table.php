<?php namespace Cyd293\CCatalog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('cyd293_ccatalog_products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('product_id');
            $table->string('product_name');
            $table->string('product_slug')->unique();
            $table->boolean('product_is_active')->default(true);
            $table->boolean('product_featured')->default(false);
            $table->longText('product_description');
            $table->longText('product_content');
            $table->integer('product_brand_id')->nullable();

            $table->timestamp('product_created_at')->nullable();
            $table->timestamp('product_updated_at')->nullable();
        });

        Schema::create('cyd293_ccatalog_product_properties', function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->integer('product_property_id');
          $table->integer('product_property_product_id');
          $table->string('product_property_type');
          $table->string('product_property_value');

          $table->timestamp('product_property_created_at')->nullable();
          $table->timestamp('product_property_updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cyd293_ccatalog_products');
        Schema::dropIfExists('cyd293_ccatalog_product_properties');
    }
}
