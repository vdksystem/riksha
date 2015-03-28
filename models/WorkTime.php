<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "workTime".
 *
 * @property integer $id
 * @property string $timeFrom
 * @property string $timeTo
 */
class WorkTime extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'workTime';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['timeFrom', 'timeTo'], 'required'],
            [['timeFrom', 'timeTo'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'timeFrom' => 'Начало работы',
            'timeTo' => 'Окончание работы',
        ];
    }
}
