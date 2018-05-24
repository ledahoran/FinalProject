<?php

namespace app\controllers;
use app\models\Songs;
use yii;
use app\models\User;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\AccessRule;

class SongsController extends \yii\web\Controller
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
        $model = new Songs;

        if($model->load(Yii::$app->request->post()) && $model->save()
        ){
            return $this->redirect(['/songs/index']);
        }
        return $this->render('create',['model' => $model]);
    }

    public function actionDelete($id)
    {
        $model = Songs::findOne($id);

        Yii::$app->db->createCommand()
        ->delete('songs','id=:id',[':id'=>$id])
        ->execute();

        $model->delete();
        
        return $this->redirect(['/songs/index']);
    }

    public function actionIndex()
    {
        $songs = Songs::find()->orderBy('title')->all();
        return $this->render('index',compact('songs'));
    }

    public function actionUpdate($id)
    {
        $model = Songs::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', compact('model'));
    }

    public function actionView($id)
    {
        $model = Songs::findOne($id);

        return $this->render('view',compact('model'));
    }

}
