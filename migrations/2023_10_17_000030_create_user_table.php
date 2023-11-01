<?php

namespace app\migrations;
        
use app\core\base\MigrationTool;
use app\core\Blueprint;

class create_user_table extends MigrationTool
{
    public function up()
    {
        $this->schema->create('user', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('email');
            $table->string('password');
            $table->string('address');
            $table->integer('phone', 10);
            $table->string('avatar');
            $table->softDeletes();
            $table->timestamps();
        });
    }
        
    public function down()
    {
        $this->schema->dropIfExists('user');
    }

}
