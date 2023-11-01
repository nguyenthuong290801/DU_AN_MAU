<?php

namespace app\migrations;
        
use app\core\base\MigrationTool;
use app\core\Blueprint;

class create_product_table extends MigrationTool
{
    public function up()
    {
        $this->schema->create('product', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('slug');
            $table->integer('price');
            $table->integer('sale_price');
            $table->text('description');
            $table->text('description_sub');
            $table->string('thumbnail', 255);
            $table->integer('category_id');
            $table->enum('status', ['Đang hoạt động', 'Không hoạt động', 'Đang xử lý']);
            $table->softDeletes();
            $table->timestamps();
            $table->foreignId('category_id', 'category');
        });
    }
        
    public function down()
    {
        $this->schema->dropIfExists('prodcut');
    }

}
