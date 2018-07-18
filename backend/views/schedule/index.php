<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ScheduleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Расписания';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schedule-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать Расписание', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'provider_id',
                'value' => function ($model) {
                    return $model->provider->name;
                },
                'filter' => yii\helpers\ArrayHelper::map(\app\models\Provider::find()->all(), 'id', 'name')
            ],
            [
                'attribute' => 'week_interval',
                'value' => function ($model) {
                    return \app\models\Schedule::$weekIntervals[$model->week_interval];
                },
                'filter' => \app\models\Schedule::$weekIntervals,
            ],
            'time_start',
            'time_end',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
