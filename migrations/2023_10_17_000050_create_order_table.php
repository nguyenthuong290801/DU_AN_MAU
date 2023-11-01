<?php

namespace app\migrations;
        
use app\core\base\MigrationTool;
use app\core\Blueprint;

class create_order_table extends MigrationTool
{
    public function up()
    {
        $this->schema->create('order', function (Blueprint $table) {
            $table->id();
            $table->integer('total');
            $table->string('cart_name');
            $table->string('cart_address');
            $table->string('cart_email');
            $table->string('cart_phone');
            $table->integer('user_id');
            $table->softDeletes();
            $table->timestamps();
            $table->foreignId('user_id', 'user');
        });
    }
        
    public function down()
    {
        $this->schema->dropIfExists('order');
    }

}
