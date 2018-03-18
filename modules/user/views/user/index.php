<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить профиль', ['update'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('В магазин', ['/category/index'], ['class' => 'btn btn-success'] ) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'password',
            'auth_key',
            'email:email',
            //'status',
            //'created_at',
            //'updated_at',
            //'isAdmin',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
