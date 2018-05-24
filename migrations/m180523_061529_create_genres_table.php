<?php

use yii\db\Migration;

/**
 * Handles the creation of table `genres`.
 */
class m180523_061529_create_genres_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('genres', [
            'id' => $this->primaryKey(),
            'description' => $this->string(100)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('genres');
    }
}
