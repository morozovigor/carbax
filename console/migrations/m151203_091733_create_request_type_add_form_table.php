<?php

use yii\db\Schema;
use yii\db\Migration;

class m151203_091733_create_request_type_add_form_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('request_type_add_form', [
            'id' => Schema::TYPE_PK,
            'request_type_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'add_form_id' => Schema::TYPE_INTEGER . '(10) NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('request_type_add_form');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
