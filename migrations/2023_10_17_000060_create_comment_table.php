<?php

namespace app\migrations;
        
use app\core\base\MigrationTool;
use app\core\Blueprint;

class create_comment_table extends MigrationTool
{
    public function up()
    {
        $this->schema->create('comment', function (Blueprint $table) {
            $table->id();
            $table->text('review');
            $table->string('comment_name');
            $table->string('email');
            $table->integer('user_id');
            $table->integer('product_id');
            $table->softDeletes();
            $table->timestamps();
            $table->foreignId('user_id', 'user');
            $table->foreignId('product_id', 'product');
        });
    }
        
    public function down()
    {
        $this->schema->dropIfExists('comment');
    }

}
