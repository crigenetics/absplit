<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ABTests */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Abtests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="abtests-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'code',
            'page1',
            'page2',
            'page1_hits',
            'page2_hits',
        ],
    ]) ?>



<hr>
<h3>stats</h3>

<pre>
<?php print_r($stats) ?>
</pre>


    <hr>
<h3>codes</h3>

<h4>landing</h4>
<pre>
  <?php echo htmlentities('<script type="text/javascript" src="http://frontend:7777/?r=ab/jslanding&a=').
 $model->id . htmlentities('">'); ?>
</script>
 </pre>



 <h4>hit</h4>
 <pre>
   <?php echo htmlentities('<script type="text/javascript" src="http://frontend:7777/?r=ab/js-hit">'); ?>
 </script>
  </pre>







   <h4>conversion</h4>
   <pre>
     <?php echo htmlentities('<script type="text/javascript" src="http://frontend:7777/?r=ab/js-conversion">'); ?>
   </script>
    </pre>


</div>
