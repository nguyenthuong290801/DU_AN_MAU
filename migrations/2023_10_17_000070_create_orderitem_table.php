<?php

namespace app\migrations;
        
use app\core\base\MigrationTool;
use app\core\Blueprint;

class create_orderitem_table extends MigrationTool
{
    public function up()
    {
        $this->schema->create('orderitem', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('product_id');
            $table->softDeletes();
            $table->timestamps();
            $table->foreignId('order_id', 'order');
            $table->foreignId('product_id', 'product');
        });
    }
        
    public function down()
    {
        $this->schema->dropIfExists('order-item');
    }

}
