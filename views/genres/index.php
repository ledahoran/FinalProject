<?php 

use yii\helpers\Html;
use common\model\Songs;


$this->title = "Genres";
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= $this->title?></h1>
<p>
<?php if(Yii::$app->user->isGuest): ?>
    <span class="pull-right">Please <?= Html::a('login',['/site/login'])?> to create an author.</span>
<?php else: ?>
    <?= Html::a('Create Genre', ['create'], ['class' => 'btn btn-success']) ?>
    <?php endif; ?>

<table class="table table-bordered">
    <tr>
        <th>Description</th>
    </tr>
    <?php foreach($genres as $songs) : ?>
    <tr>
    
    <td>
            <?= Html::a($songs->description, ['/genres/view', 'id'=>$songs->id]); ?>
    </td>  
    </tr>
    <?php endforeach; ?>
</table>
