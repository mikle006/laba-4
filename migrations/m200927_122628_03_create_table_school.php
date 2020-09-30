<?php

use yii\db\Migration;

class m200927_122628_03_create_table_school extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%school}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
            'countryID' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('countryID', '{{%school}}', 'countryID');
        $this->addForeignKey('school_ibfk_1', '{{%school}}', 'countryID', '{{%country}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%school}}');
    }
}
