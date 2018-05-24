<?php

namespace app\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "albums".
 *
 * @property int $id
 * @property string $name
 *
 * @property Songs[] $songs
 */
class Albums extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'albums';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 250],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSongs()
    {
        return $this->hasMany(Songs::className(), ['album_id' => 'id']);
    }
}
