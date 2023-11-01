<?php

namespace app\migrations;
        
use app\core\base\MigrationTool;
use app\core\Blueprint;

class create_cart_table extends MigrationTool
{
    public function up()
    {
        $this->schema->create('cart', function (Blueprint $table) {
            $table->id();
        });
    }
        
    public function down()
    {
        $this->schema->dropIfExists('cart');
    }

}
