<?php

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii;
use yii\data\Pagination;

class CategoryController extends AppController{

    public function actionIndex(){
        $hits = Product::find()->where(['hit' => '1'])->limit(9)->all();
        $brands = Category::find()->select('name, id')->where('parent_id > :param', ['param' => 0])->all();
        $this->setMeta('Shop');
        return $this->render('index', compact('hits', 'brands'));
    }

    public function actionView($id){
//        $id = Yii::$app->request->get('id');
        $category = Category::findOne($id);
        if(empty($category))
            throw new \yii\web\HttpException(404, 'Такой категории нет');
        //        $products = Product::find()->where(['category_id' => $id])->all();

        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 3,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        $this->setMeta('Shop | ' . $category->name, $category->keywords, $category->description);
        return $this->render('view', compact('products', 'pages', 'category'));
    }

    public function actionSearch(){
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta('Shop | Поиск: ' . $q);
        if(!$q)
            return $this->render('search');
        $query = Product::find()->where(['like', 'name', $q]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search', compact('products', 'pages', 'q'));
    }

    public function actionAbout(){
        return $this->render('about');
    }

    public function actionPolicy(){
        return $this->render('policy');
    }

}