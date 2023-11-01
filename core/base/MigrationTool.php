<?php

namespace app\core\base;
use app\core\Schema;

abstract class MigrationTool
{
    protected $schema;

    public function __construct()
    {
        $this->schema = new Schema();
    }

    abstract public function up();

    abstract public function down();

}