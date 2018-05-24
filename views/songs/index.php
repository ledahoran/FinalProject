<?php 

use yii\helpers\Html;
use common\model\Songs;


$this->title = "Songs";
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= $this->title?></h1>
<p>
<?php if(Yii::$app->user->isGuest): ?>
    <span class="pull-right">Please <?= Html::a('login',['/site/login'])?> to create an author.</span>
<?php else: ?>
    <?= Html::a('Create Song', ['create'], ['class' => 'btn btn-success']) ?>
    <?php endif; ?>

<table class="table table-bordered">
    <tr>
        <th>Id</th>
        <th>Genre Id</th>
        <th>Artist Id</th>
        <th>Album Id</th>
        <th>Title</th>
        <th>Year Release</th>
    </tr>
    <?php foreach($songs as $songs) : ?>
    <tr>
    
    <td>
            <?= Html::a($songs->id, ['/songs/view', 'id'=>$songs->id]); ?>
        </td>  
        <td><?= $songs->genre_id ?></td>
        <td><?= $songs->artist_id ?></td>
        <td><?= $songs->album_id ?></td>
        <td><?= $songs->title ?></td>
        <td><?= $songs->year_release ?></td>
    </tr>
    <?php endforeach; ?>
</table>
