<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ABTests */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="abtests-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'page1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'page2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'page1_hits')->textInput() ?>

    <?= $form->field($model, 'page2_hits')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
