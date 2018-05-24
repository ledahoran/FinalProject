<?php

namespace app\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "songs".
 *
 * @property int $id
 * @property int $genre_id
 * @property int $artist_id
 * @property int $album_id
 * @property string $title
 * @property string $year_release
 *
 * @property Albums $album
 * @property Artists $artist
 * @property Genres $genre
 */
class Songs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'songs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['genre_id', 'artist_id', 'album_id', 'title'], 'required'],
            [['genre_id', 'artist_id', 'album_id'], 'integer'],
            [['year_release'], 'safe'],
            [['title'], 'string', 'max' => 280],
            [['album_id'], 'exist', 'skipOnError' => true, 'targetClass' => Albums::className(), 'targetAttribute' => ['album_id' => 'id']],
            [['artist_id'], 'exist', 'skipOnError' => true, 'targetClass' => Artists::className(), 'targetAttribute' => ['artist_id' => 'id']],
            [['genre_id'], 'exist', 'skipOnError' => true, 'targetClass' => Genres::className(), 'targetAttribute' => ['genre_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'genre_id' => 'Genre ID',
            'artist_id' => 'Artist ID',
            'album_id' => 'Album ID',
            'title' => 'Title',
            'year_release' => 'Year Release',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbum()
    {
        return $this->hasOne(Albums::className(), ['id' => 'album_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtist()
    {
        return $this->hasOne(Artists::className(), ['id' => 'artist_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenre()
    {
        return $this->hasOne(Genres::className(), ['id' => 'genre_id']);
    }
}
