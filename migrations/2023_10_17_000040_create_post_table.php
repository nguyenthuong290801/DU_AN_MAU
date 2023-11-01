<?php

namespace app\migrations;
        
use app\core\base\MigrationTool;
use app\core\Blueprint;

class create_post_table extends MigrationTool
{
    public function up()
    {
        $this->schema->create('post', function (Blueprint $table) {
            $table->id();
            $table->string('post_name');
            $table->text('description');
            $table->string('thumbnail');
            $table->integer('view');
            $table->integer('cmt');
            $table->integer('category_id');
            $table->enum('status', ['Đang hoạt động', 'Không hoạt động', 'Đang xử lý']);
            $table->softDeletes();
            $table->timestamps();
            $table->foreignId('category_id', 'category');
        });
    }
        
    public function down()
    {
        $this->schema->dropIfExists('post');
    }

}
