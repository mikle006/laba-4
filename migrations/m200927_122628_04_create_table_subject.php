<?php

use yii\db\Migration;

class m200927_122628_04_create_table_subject extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%subject}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'cabinetID' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('cabinetID', '{{%subject}}', 'cabinetID');
        $this->addForeignKey('subject_ibfk_1', '{{%subject}}', 'cabinetID', '{{%cabinet}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%subject}}');
    }
}
