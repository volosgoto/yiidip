<?php

namespace app\modules\user\controllers;

use app\modules\user\models\User;
use yii\data\ActiveDataProvider;
use Yii;

class UserController extends DefaultController {


    public function actionIndex() {
//        $dataProvider = new ActiveDataProvider([
//            'query' => User::find()->where(['id' => Yii::$app->user->identity['id']]),
//        ]);
//        return $this->render('index', compact('dataProvider'));
    }


    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Профиль пользователя обновлен");
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', compact('model'));
        }
        return $this->render('update', compact('model'));
    }


    public function actionView() {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find()->where(['id' => Yii::$app->user->identity['id']]),
        ]);
        $model = User::findOne(Yii::$app->user->identity['id']);
        return $this->render('view', compact('dataProvider', 'model'));
    }


    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Пользователь не найден.');
    }
}

