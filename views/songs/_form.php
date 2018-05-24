<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Genres;
use app\models\Artists;
use app\models\Albums;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'genre_id')->dropDownList(ArrayHelper::map(
            Genres::find()->asArray()->all(), 'id','id'))?>

    <?= $form->field($model, 'artist_id')->dropDownList(ArrayHelper::map(
            Artists::find()->asArray()->all(), 'id','id'))?>

     <?= $form->field($model, 'album_id')->dropDownList(ArrayHelper::map(
            Albums::find()->asArray()->all(), 'id','id'))?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year_release')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
	