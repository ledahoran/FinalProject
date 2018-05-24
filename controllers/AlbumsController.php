<?php

namespace app\controllers;
use app\models\Albums;
use yii;
use app\models\User;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\AccessRule;

class AlbumsController extends \yii\web\Controller
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
        $model = new Albums;

        if($model->load(Yii::$app->request->post()) && $model->save()
        ){
            return $this->redirect(['/albums/index']);
        }
        return $this->render('create',['model' => $model]);
    }

    public function actionDelete($id)
    {
        Albums::findOne($id)->delete();
        return $this->redirect(['/albums/index']);
    }

    public function actionIndex()
    {
        $albums = Albums::find()->orderBy('name')->all();
        return $this->render('index',['albums'=>$albums]);
    }

    public function actionUpdate($id)
    {
        $model = Albums::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', compact('model'));
    }

    public function actionView($id)
    {
        $model = Albums::FindOne($id);
        return $this->render('view',compact('model'));
    }
}
