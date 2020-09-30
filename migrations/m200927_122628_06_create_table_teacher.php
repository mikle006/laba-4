<?php

use yii\db\Migration;

class m200927_122628_06_create_table_teacher extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%teacher}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'phone' => $this->integer(128)->notNull(),
            'subjectID' => $this->integer()->notNull(),
            'schoolID' => $this->integer()->notNull(),
            'countryID' => $this->integer()->notNull(),
            'worktimeID' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('schoolID', '{{%teacher}}', 'schoolID');
        $this->createIndex('worktimeID', '{{%teacher}}', 'worktimeID');
        $this->createIndex('subjectID', '{{%teacher}}', 'subjectID');
        $this->createIndex('countryID', '{{%teacher}}', 'countryID');
        $this->addForeignKey('teacher_ibfk_1', '{{%teacher}}', 'countryID', '{{%country}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('teacher_ibfk_2', '{{%teacher}}', 'schoolID', '{{%school}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('teacher_ibfk_3', '{{%teacher}}', 'subjectID', '{{%subject}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('teacher_ibfk_4', '{{%teacher}}', 'worktimeID', '{{%worktime}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%teacher}}');
    }
}
