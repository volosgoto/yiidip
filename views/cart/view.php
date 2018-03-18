<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


?>

<div class="container">
    <?php if( Yii::$app->session->hasFlash('success') ): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif;?>

    <?php if( Yii::$app->session->hasFlash('error') ): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('error'); ?>
        </div>
    <?php endif;?>

    <?php if(!empty($session['cart'])): ?>
        <div class="table-responsive">
            <?php if(!Yii::$app->user->isGuest): ?>
                <div>
                    <h2>
                    <?php echo  'Корзина: ' . Yii::$app->user->identity['username'] ?>
<!--                        --><?php //echo Yii::$app->user->getId() ?>
                    </h2>
                </div>
            <?php endif;?>

            <table class="table table-hover table-striped">

                <thead>
                <tr>
                    <th>Фото</th>
                    <th>Наименование</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th>Сумма</th>
                    <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($session['cart'] as $id => $item):?>
                    <tr>
                        <td><?= \yii\helpers\Html::img($item['img'], ['alt' => $item['name'], 'height' => 50]) ?></td>
                        <td><a href="<?php echo Url::to(['product/view', 'id' => $id])?>"><?= $item['name']?></a></td>

                        <td><?= $item['qty']?></td>
                        <td><?= $item['price']?></td>
                        <td><?= $item['price'] * $item['qty']?></td>
                        <td><span data-id="<?= $id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                    </tr>пользователя
                <?php endforeach?>
                <tr>
                    <td colspan="5">Итого: </td>
                    <td><?= $session['cart.qty']?></td>
                </tr>
                <tr>
                    <td colspan="5">На сумму: </td>
                    <td><?= $session['cart.sum']?></td>
                </tr>
                </tbody>
            </table>
        </div>

        <hr>

        <?php $form = ActiveForm::begin()?>
        <?= $form->field($order, 'name')?>
        <?= $form->field($order, 'email')?>
        <?= $form->field($order, 'phone')?>
        <?= $form->field($order, 'address')?>

        <?php if(!Yii::$app->user->isGuest): ?>
                <?= Html::submitButton('Заказать', ['class' => 'btn btn-primary', 'name' => 'quik_order'])?>
        <?php endif;?>

        <?php if(Yii::$app->user->isGuest): ?>
            <?= Html::submitButton('Быстрый заказ', ['class' => 'btn btn-primary', 'name' => 'quik_order'])?>
            <?= Html::a('Войти', ['/site/login'], ['class'=>'btn btn-success']) ?>
            <?= Html::a('Зарегистрироваться', ['/site/signup'], ['class'=>'btn btn-danger']) ?>
        <?php endif;?>


        <?php ActiveForm::end()?>

    <?php else: ?>
        <h3>Корзина пуста</h3>
    <?php endif;?>
</div>
