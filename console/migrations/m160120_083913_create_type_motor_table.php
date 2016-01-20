<?php

use yii\db\Schema;
use yii\db\Migration;

class m160120_083913_create_type_motor_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('type_motor', [
            'id'                    => Schema::TYPE_PK,
            'name'                  => Schema::TYPE_INTEGER. '(11) NOT NULL',

        ], $tableOptions);

        $this->insert('transmission', [
            'name' => 'Бензин'
        ]);

        $this->insert('transmission', [
            'name' => 'Дизель'
        ]);

        $this->insert('transmission', [
            'name' => 'Гибрид'
        ]);

        $this->insert('transmission', [
            'name' => 'Электро'
        ]);

        $this->insert('transmission', [
            'name' => 'Газ'
        ]);
    }

    public function down()
    {
        $this->dropTable('type_motor');
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
