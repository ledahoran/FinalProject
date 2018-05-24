<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Songs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="songs-view">

<span class="pull-right">
<?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this Song?',
                'method' => 'post',
            ],
        ]) ?>
</span>
    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'genre_id',
            'artist_id',
            'album_id',
            'title',
            'year_release',
        ],
    ]) ?>

</div>
