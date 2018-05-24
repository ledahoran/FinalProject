<?php

namespace app\controllers;
use app\models\Genres;
use yii;
use app\models\User;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\AccessRule;

class GenresController extends \yii\web\Controller
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
        $model = new Genres;

        if($model->load(Yii::$app->request->post()) && $model->save()
        ){
            return $this->redirect(['/genres/index']);
        }
        return $this->render('create',['model' => $model]);
    }

    public function actionDelete($id)
    {
        Genres::findOne($id)->delete();
        return $this->redirect(['/genres/index']);
    }

    public function actionIndex()
    {
        $genres = Genres::find()->orderBy('description')->all();
        return $this->render('index',['genres'=>$genres]);
    }

    public function actionUpdate($id)
    {
        $model = Genres::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', compact('model'));
    }

    public function actionView($id)
    {
        $model = Genres::FindOne($id);
        return $this->render('view',compact('model'));
    }

}