<?php

use yii\db\Migration;

/**
 * Handles the creation of table `songs`.
 */
class m180523_021513_create_songs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('songs', [
            'id' => $this->primaryKey(),
            'genre_id' => $this->integer()->notNull(),
            'artist_id' => $this->integer()->notNull(),
            'album_id' => $this->integer()->notNull(),
            'title' => $this->string(200)->notNull(),
            'date_release' => $this->dateTime()->notNull()           
        ]);

        $this->createIndex('idx-songs-genre_id','
            songs','genre_id');

        $this->addForeinKey('fk-songs-genre','
            songs','genre_id','genre','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('songs');
    }
}
