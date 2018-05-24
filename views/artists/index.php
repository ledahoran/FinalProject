<?php 

use yii\helpers\Html;
use common\model\Songs;


$this->title = "Artists";
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= $this->title?></h1>
<p>
<?php if(Yii::$app->user->isGuest): ?>
    <span class="pull-right">Please <?= Html::a('login',['/site/login'])?> to create an author.</span>
<?php else: ?>
     <?= Html::a('Create Artist', ['create'], ['class' => 'btn btn-success']) ?>
     <?php endif; ?>

<table class="table table-bordered table-stripped">
    <tr>
        <th>Name</th>
        <th>Origin</th>
    </tr>
    <?php foreach($artists as $songs) : ?>
    <tr>
    
    <td>
            <?= Html::a($songs->name, ['/artists/view', 'id'=>$songs->id]); ?>
        </td>  
        <td><?= $songs->origin ?></td>
    </tr>
    <?php endforeach; ?>
</table>
