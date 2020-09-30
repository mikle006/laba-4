<?php

use yii\db\Migration;

class m200927_122628_05_create_table_worktime extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%worktime}}', [
            'id' => $this->primaryKey(),
            'fromTime' => $this->time()->notNull(),
            'toTime' => $this->time()->notNull(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%worktime}}');
    }
}
