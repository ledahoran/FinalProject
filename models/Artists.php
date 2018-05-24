<?php

namespace app\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "artists".
 *
 * @property int $id
 * @property string $name
 * @property string $origin
 *
 * @property Songs[] $songs
 */
class Artists extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'artists';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'origin'], 'required'],
            [['name'], 'string', 'max' => 200],
            [['origin'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'origin' => 'Origin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSongs()
    {
        return $this->hasMany(Songs::className(), ['artist_id' => 'id']);
    }
}
