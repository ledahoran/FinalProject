<?php

use yii\helpers\Html;

$this->title = 'Create Album';
$this->params['breadcrumbs'][] = ['label' => 'albums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-create">
    <div class="row">
	    <div class="col-md-6">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
        </div>
    </div>
</div>
