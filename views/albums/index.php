<?php 

use yii\helpers\Html;
use common\model\songs;

$this->title = "Albums";
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= $this->title?></h1>
<p>
<?php if(Yii::$app->user->isGuest): ?>
    <span class="pull-right">Please <?= Html::a('login',['/site/login'])?> to create an author.</span>
<?php else: ?>
    <?= Html::a('Create Album', ['create'], ['class' => 'btn btn-success']) ?>
    <?php endif; ?>

<table class="table table-bordered table-stripped">
    <tr>
        <th>Name</th>
    </tr>
    <?php foreach($albums as $songs) : ?>
    <tr>
    
    <td>
            <?= Html::a($songs->name, ['/albums/view', 'id'=>$songs->id]); ?>
        </td>  
    </tr>
    <?php endforeach; ?>
</table>
