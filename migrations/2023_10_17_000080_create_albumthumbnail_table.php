<?php

namespace app\migrations;
        
use app\core\base\MigrationTool;
use app\core\Blueprint;

class create_albumthumbnail_table extends MigrationTool
{
    public function up()
    {
        $this->schema->create('albumthumbnail', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('thumbnail');
            $table->softDeletes();
            $table->timestamps();
            $table->foreignId('product_id', 'product');
        });
    }
        
    public function down()
    {
        $this->schema->dropIfExists('album-thumbnail');
    }

}
