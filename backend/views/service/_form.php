<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Service */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-form">

    <?php
        $form = ActiveForm::begin();
        $parentChoices = [null => "Нуль-категория"] + \yii\helpers\ArrayHelper::map(\app\models\Service::find()->all(), 'id', 'name');
        if ($model->id !== null) unset($parentChoices[$model->id]);
    ?>

    <?= $form->field($model, 'parent')->dropDownList($parentChoices) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
