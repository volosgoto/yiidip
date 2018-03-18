<?php

namespace app\modules\user\controllers;

use app\modules\user\models\User;
use yii\data\ActiveDataProvider;
use Yii;
use yii\helpers\ArrayHelper;

class UserController extends DefaultController {


    public function actionIndex() {
//        $dataProvider = new ActiveDataProvider([
//            'query' => User::find()->where(['id' => Yii::$app->user->identity['id']]),
//        ]);
//        return $this->render('index', compact('dataProvider'));
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

    public function actionCart(){
        $session = Yii::$app->session;
        $session->open();
        $this->setMeta('Корзина');
        $order = new Order();
        if( $order->load(Yii::$app->request->post()) ){
            $order->qty = $session['cart.qty'];
            $order->sum = $session['cart.sum'];
            if($order->save()){

                $this->saveOrderItems($session['cart'], $order->id);

                Yii::$app->session->setFlash('success', 'Ваш заказ принят. Менеджер вскоре свяжется с Вами.');

                Yii::$app->mailer->compose('order', ['session' => $session])
                    ->setFrom(['username@mail.ru' => 'yiidip.loc'])
                    ->setTo($order->email)
                    ->setSubject('Заказ')
                    ->send();

                $session->remove('cart');
                $session->remove('cart.qty');
                $session->remove('cart.sum');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error', 'Ошибка оформления заказа');
            }
        }
        return $this->render('view', compact('session', 'order'));
    }

    public function actionUpdate($id) {
        $model = $this->findModel($id);
        debug(Yii::$app->request->post());
        if (Yii::$app->request->post()){
            $model->load(Yii::$app->request->post());
            $pass = $_POST['User']['password'];
            $model->setPassword($pass);
            $model->save();
            Yii::$app->session->setFlash('success', "Профиль пользователя обновлен");
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', compact('model'));
        }
        return $this->render('update', compact('model'));
    }
}

