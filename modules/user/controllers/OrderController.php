<?php

namespace app\modules\user\controllers;

use app\modules\user\models\Order;
use app\modules\user\models\User;
use Yii;
use yii\data\ActiveDataProvider;


class OrderController extends \yii\web\Controller
{
    public function actionIndex()
    {
//        $dataProvider = new ActiveDataProvider([
////            $id = Yii::$app->user->getId();
//            'query' => Order::find()->with('id'),
//        ]);
//
//        return $this->render('index', [
//            'dataProvider' => $dataProvider,
//        ]);
        $id = Yii::$app->user->getId();
        $orders = Order::find()->where(['user_id' => $id])->all();
        if(empty($id)){
            throw new \yii\web\HttpException(404, 'У пользователя нет заказов');
        }
        return $this->render('index', compact('orders'));
    }


    public function actionView(){
//        $id = Yii::$app->user->getId();
//        $order = Order::find()->where(['user_id' => $id])->all();
//        if(empty($id)){
//            throw new \yii\web\HttpException(404, 'У пользователя нет заказов');
//        }
//        return $this->render('view', compact('order'));
    }

}
