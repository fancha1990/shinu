<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Height".
 *
 * @property integer $id
 * @property string $height
 */
class Height extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Height';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['height'], 'required'],
            [['height'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'height' => 'Height',
        ];
    }
}
