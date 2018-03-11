<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container"></div>
<div class="site-login container">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if  ( !empty(Yii::$app->session->hasFlash('success'))) :?>
        <div class="alert alert-success">
            <h1> <?php  echo Yii::$app->session->getFlash('success');?> </h1>
        </div>
    <?php  endif;?>

<!--    --><?php //if  ( null !== Yii::$app->session->hasFlash('error')) :?>
<!--        <div class="alert alert-success">-->
<!--            <h1> --><?php // echo Yii::$app->session->getFlash('error');?><!-- </h1>-->
<!--        </div>-->
<!--    --><?php // endif;?>


    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <div class="form-group">
                <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
                <?= Html::submitButton('Вернуться', ['class' => 'btn btn-warning', 'name' => 'go_back-button']) ?>
                <?= Html::submitButton('На главную', ['class' => 'btn btn-primary', 'name' => 'go_home-button'] ) ?>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>