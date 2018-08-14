<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ABTests */

$this->title = 'Create Abtests';
$this->params['breadcrumbs'][] = ['label' => 'Abtests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="abtests-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
