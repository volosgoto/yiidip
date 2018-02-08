<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 07.02.18
 * Time: 14:13
 */

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;

class CategoryController extends AppController {


    public function actionIndex(){
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        //debug($hits);
        return $this->render('index', compact('hits'));
    }
}