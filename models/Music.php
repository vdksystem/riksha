<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "music".
 *
 * @property integer $id
 * @property string $fileName
 */
class Music extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'music';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fileName'], 'required'],
            [['fileName'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fileName' => 'File Name',
        ];
    }
}
