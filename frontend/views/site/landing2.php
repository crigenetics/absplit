

<h1>test landing 2</h2>

landing page 2

<br>


<hr>

<h3>nav</h3>

<h4>landing1</h4>
<a href="<?php echo \yii\helpers\Url::to(['/site/landing1']) ?>">landing</a>

<h4>next url</h4>
<a href="<?php echo \yii\helpers\Url::to(['/site/hit', 'random' => md5(time())]) ?>">hit</a>

<h4>conversion</h4>
<a href="<?php echo \yii\helpers\Url::to(['/site/conversion']) ?>">conv</a>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript" src="http://frontend:7777/?r=ab/js-hit"></script>
