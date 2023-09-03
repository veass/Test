<?php

use yii\db\Migration;

/**
 * Class m230831_122742_lesson_plan
 */
class m230831_122742_create_lesson_plan extends Migration
{
 /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lesson_plan}}', [
            'id' => $this->primaryKey(),
            'lesson_id' => $this->integer(),
            'user_id' => $this->integer(),
            'is_done' => $this->boolean()->comment('0 - не прошёл урок, 1 - прошёл урок'),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

    $this->addForeignKey('fk-lesson_plan-lesson_id', '{{%lesson_plan}}', 'lesson_id', '{{%lessons}}', 'id', 'RESTRICT');
    $this->createIndex('idx-lesson_plan-lesson_id', '{{%lesson_plan}}', 'lesson_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%lesson_plan}}');
    }
}
