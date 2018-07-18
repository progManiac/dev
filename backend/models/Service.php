<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "service".
 *
 * @property int $id
 * @property int $parent
 * @property string $name
 *
 * @property Provider[] $providers
 * @property Service $parent0
 * @property Service[] $services
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent'], 'integer', 'when'
            => function($model)
            {
                return $model->parent !== null; //temp
            }],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            //[['parent'], 'exist', 'skipOnError' => true, 'targetClass' => Service::className(), 'targetAttribute' => ['parent' => 'id']],
            [['parent'], 'exist', 'skipOnError' => true, 'targetClass' => Service::className(), 'targetAttribute' => ['parent' => 'id'], 'when'
            => function($model) {
                return $model->parent !== null;
            }],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер п/п',
            'parent' => 'Категория',
            'name' => 'Название',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProviders()
    {
        return $this->hasMany(Provider::className(), ['service' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(Service::className(), ['id' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasMany(Service::className(), ['parent' => 'id']);
    }
}
