<?php

namespace app\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "genres".
 *
 * @property int $id
 * @property string $description
 *
 * @property Songs[] $songs
 */
class Genres extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genres';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['description'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSongs()
    {
        return $this->hasMany(Songs::className(), ['genre_id' => 'id']);
    }
}
