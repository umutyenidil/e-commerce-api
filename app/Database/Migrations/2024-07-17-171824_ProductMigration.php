<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                "type" => "VARCHAR",
                "constraint" => 36,
                "null" => false,
            ],
            "name" => [
                "type" => "TEXT",
                "null" => false,
            ],
            "description" => [
                "type" => "TEXT",
                "null" => false,
            ],
            "created_at" => [
                "type" => "DATETIME",
                "null" => false,
            ],
            "updated_at" => [
                "type" => "DATETIME",
                "null" => false,
            ],
            "deleted_at" => [
                "type" => "DATETIME",
                "null" => true,
            ],
        ]);

        $this->forge->addPrimaryKey("id");

        $this->forge->createTable("products");
    }

    public function down()
    {
        $this->forge->dropTable("products");
    }
}
