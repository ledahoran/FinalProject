<?php

use yii\db\Migration;

/**
 * Handles the creation of table `music_library`.
 */
class m180523_015904_create_music_library_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('music_library', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('music_library');
    }
}
