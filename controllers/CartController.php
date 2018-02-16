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
        $product = Product::findOne($id);

        if(empty($product)) return false;

        $session =Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->addToCart($product);
        $this->layout = true;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionClear(){
        $session =Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

}