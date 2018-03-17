<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список заказов';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?php if(!empty($orders)): ?>
        <?php foreach($orders as $order): ?>
            <div class="col-sm-4">
                        <div class="productinfo text-center">
                            <h2>Номер заказа <?= $order->id?></h2>
                            <p>Создан <?= $order->created_at ?></p>
                            <p>Обновлен <?= $order->updated_at ?></p>
                            <p>Статус <?= $order->status ?></p>
                            <p>Товаров <?= $order->qty ?>, шт.</p>
                            <p>На сумму <?= $order->sum ?></p>
                        </div>
            </div>
        <?php endforeach;?>
    <?php endif; ?>

</div>
