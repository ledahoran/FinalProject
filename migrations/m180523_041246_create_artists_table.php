<?php

use yii\db\Migration;

/**
 * Handles the creation of table `artists`.
 */
class m180523_041246_create_artists_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('artists', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)->notNull(),
            'origin' => $this->string(300)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('artists');
    }
}
