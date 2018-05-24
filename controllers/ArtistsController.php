<?php

namespace app\controllers;
use app\models\Artists;
use yii;
use app\models\User;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\AccessRule;

class ArtistsController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                'class' => AccessRule::className(),
                ],
                'only' => ['create','update','delete'],
                'rules'=>[
                    [
                        'actions'=>['create','update'],
                        'allow' => true,
                        'roles' => ['@']
                    ],
                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => [User::ROLE_ADMIN]
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                'delete' => ['POST'],
                ],
            ],


        ];
    }
    public function actionCreate()
    {
        $model = new Artists;

        if($model->load(Yii::$app->request->post()) && $model->save()
        ){
            return $this->redirect(['/artists/index']);
        }
        return $this->render('create',['model' => $model]);
    }

    public function actionDelete($id)
    {
        Artists::findOne($id)->delete();
        return $this->redirect(['/artists/index']);
    }

    public function actionIndex()
    {
        $artists = Artists::find()->orderBy('name')->all();
        return $this->render('index',['artists'=>$artists]);
    }

    public function actionUpdate($id)
    {
        $model = Artists::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', compact('model'));
    }

    public function actionView($id)
    {
        $model = Artists::findOne($id);
        return $this->render('view',compact('model'));
    }

}
