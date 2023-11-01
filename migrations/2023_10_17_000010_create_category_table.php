<?php

namespace app\migrations;
        
use app\core\base\MigrationTool;
use app\core\Blueprint;

class create_category_table extends MigrationTool
{
    public function up()
    {
        $this->schema->create('category', function (Blueprint $table) {
            $table->id();
            $table->string('category_name');
            $table->enum('type', ['post', 'product']);
            $table->enum('status', ['Đang hoạt động', 'Không hoạt động', 'Đang xử lý']);
            $table->softDeletes();
            $table->timestamps();
        });
    }
        
    public function down()
    {
        $this->schema->dropIfExists('category');
    }

}
