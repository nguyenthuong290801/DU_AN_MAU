<?php

namespace app\migrations;
        
use app\core\base\MigrationTool;
use app\core\Blueprint;

class create_attribute_table extends MigrationTool
{
    public function up()
    {
        $this->schema->create('attribute', function (Blueprint $table) {
            $table->id();
            $table->string('size');
            $table->string('color');
            $table->string('quantity');
            $table->integer('product_id');
            $table->softDeletes();
            $table->timestamps();
            $table->foreignId('product_id', 'product');
        });
    }
        
    public function down()
    {
        $this->schema->dropIfExists('attrribute');
    }

}
