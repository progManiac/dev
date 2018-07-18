<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Schedule */

$this->title = $model->provider->name . ' в ' . \app\models\Schedule::$weekIntervals[$model->week_interval];
$this->params['breadcrumbs'][] = ['label' => 'Расписания', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schedule-view">

    <h1><?=
        Html::encode($this->title) //$model->provider->name . ' в ' . \app\models\Schedule::$weekIntervals[$model->week_interval]  ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить эту запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'provider_id',
                'value' => function ($model) {
                    return $model->provider->name;
                },
            ],
            [
                'attribute' => 'week_interval',
                'value' => function ($model) {
                    return \app\models\Schedule::$weekIntervals[$model->week_interval];
                },
            ],
            'time_start',
            'time_end',
        ],
    ]) ?>

</div>
