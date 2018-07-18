<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property int $id
 * @property int $provider_id
 * @property int $week_interval
 * @property string $time_start
 * @property string $time_end
 *
 * @property Provider $provider
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedule';
    }

    public static $weekIntervals = [
        '0' => 'Понедельник - пятница',
        '1' => 'Суббота',
        '2' => 'Воскресенье',
        '3' => 'Понедельник',
        '4' => 'Вторник',
        '5' => 'Среда',
        '6' => 'Четверг',
        '7' => 'Пятница',
    ];

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['provider_id', 'week_interval', 'time_start', 'time_end'], 'required'],
            [['provider_id', 'week_interval'], 'integer'],
            [['time_start', 'time_end'], 'safe'],
            [['provider_id'], 'exist', 'skipOnError' => true, 'targetClass' => Provider::className(), 'targetAttribute' => ['provider_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер п/п',
            'provider_id' => 'Номер п/п поставщика',
            'week_interval' => 'Дни недели',
            'time_start' => 'Время начала работы',
            'time_end' => 'Время окончания работы',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvider()
    {
        return $this->hasOne(Provider::className(), ['id' => 'provider_id']);
    }
}
