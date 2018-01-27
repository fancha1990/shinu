<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Diameter".
 *
 * @property integer $id
 * @property string $diameter
 */
class Diameter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Diameter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['diameter'], 'required'],
            [['diameter'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'diameter' => 'Diameter',
        ];
    }
}
