<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php  $img = $model->getImage();

//    $url = $img->getUrl();
//    $url = explode(DIRECTORY_SEPARATOR, $url);
//    unset ($url [0]);
//    unset ($url [1]);
//    $url = array_values($url);
//    array_unshift($url, 'yii2images');
//    $imagePath = implode(DIRECTORY_SEPARATOR, $url);

//    debug($img->getUrl());
//    debug($imagePath);

//    die;
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'category_id',
            'name',
            'content:ntext',
            'price',
            'keywords',
            'description',
            [
                'attribute' => 'image',
//                'value' => "<img src='{$img->getUrl()}'>",
                'value' => "<img src='/images/upload/store/{$img->filePath}'>",
                'format' => 'html',
            ],
//            [
//                'attribute' => 'image',
//                'value' => "<img src='/$imagePath'>",
//                'format' => 'html',
//            ],

//            'img',
            'hit',
            'new',
            'sale',
        ],
    ]) ?>

</div>


