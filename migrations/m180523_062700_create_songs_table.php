<?php

use yii\db\Migration;

/**
 * Handles the creation of table `songs`.
 */
class m180523_062700_create_songs_table extends Migration
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
            'title' => $this->string(280)->notNull(),
            'year_release' => $this->string(225)->notNull()
        ]);

        $this->createIndex('idx-songs-genre_id','songs','genre_id');

        $this->addForeignKey('fk-songs-genres','songs','genre_id','genres','id');

        $this->createIndex('idx-songs-artist_id','songs','artist_id');

        $this->addForeignKey('fk-songs-artists','songs','artist_id','artists','id');

        $this->createIndex('idx-songs-album_id','songs','album_id');

        $this->addForeignKey('fk-songs-albums','songs','album_id','albums','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-songs-genres','songs');
        $this->dropForeignkey('fk-songs-artists','songs');
        $this->dropForeignKey('fk-songs-albums','songs');
        $this->dropIndex('idx-songs-genre_id','songs');
        $this->dropIndex('idx-songs-artist_id','songs');
        $this->dropIndex('idx-songs-album_id','songs');
        $this->dropTable('songs');
    }
}