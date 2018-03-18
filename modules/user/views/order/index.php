<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ваши заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?php  echo Html::a('В магазин', ['/category/index'], ['class' => 'btn btn-success'] ); ?>
    </p>



    <?php if(!empty($orders)): ?>
        <?php foreach($orders as $order): ?>
            <div class="col-sm-4">
                        <div class="productinfo text-center">
                            <div class="text-left">
                            <h2>Номер заказа <?= $order->id?></h2>
                            <p>Создан <?= $order->created_at ?></p>
                            <p>Обновлен <?= $order->updated_at ?></p>
                            <p>Статус <?= $order->status ?></p>
                            <p>Товаров <?= $order->qty ?>, шт.</p>
                            <p>На сумму <?= $order->sum ?></p>
                        </div>
                        </div>
            </div>
        <?php endforeach;?>
    <?php else: echo '<h3>' . "У вас нет заказов" . '</h3>'; ?>
    <?php endif; ?>


</div>
