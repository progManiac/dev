<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Schedule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="schedule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'provider_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Provider::find()->all(), 'id', 'name') ) ?>

    <?= $form->field($model, 'week_interval')->dropDownList(\app\models\Schedule::$weekIntervals) ?>


    <?= $form->field($model, 'time_start')->textInput();
    //widget(DateRangePicker::className(), ['name' => 'name', 'model' => 'app\models\Schedule', 'attribute' => 'time_start', 'pluginOptions' => ['locale' => ['format' => 'h:m']]]); ?>

    <?= $form->field($model, 'time_end')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
