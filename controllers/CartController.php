<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 15.02.18
 * Time: 10:11
 */

namespace app\controllers;
use app\models\Product;
use app\models\Cart;
use Yii;

class CartController extends AppController {
    public function actionAdd(){
        $id = Yii::$app->request->get('id');
        return $id;

    }
}