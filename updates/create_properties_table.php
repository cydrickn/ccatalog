<?php namespace Cyd293\CCatalog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreatePropertiesTable extends Migration
{
    public function up()
    {
        Schema::create('cyd293_ccatalog_properties', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('property_id');
            $table->string('property_name');
            $table->string('property_slug');
            $table->string('property_type');
            $table->longText('property_values')->nullable();

            $table->timestamp('property_created_at')->nullable();
            $table->timestamp('property_updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cyd293_ccatalog_properties');
    }
}
