<?php

use yii\db\Migration;

/**
 * Handles the creation of table `albums`.
 */
class m180523_041454_create_albums_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('albums', [
            'id' => $this->primaryKey(),
            'name'=> $this->string(250)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('albums');
    }
}
