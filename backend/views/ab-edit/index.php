<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ABTestsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Abtests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="abtests-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Abtests', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'code',
            'page1',
            'page2',
            //'page1_hits',
            //'page2_hits',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
