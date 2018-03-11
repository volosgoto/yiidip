<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\ltAppAsset;

AppAsset::register($this);
ltAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <?php
//        $this->registerJsFile('js/html5shiv.js', ['position' => \yii\web\View::POS_HEAD, 'condition' => 'lte IE9']);
//        $this->registerJsFile('js/respond.min.js', ['position' => \yii\web\View::POS_HEAD, 'condition' => 'lte IE9']);
    ?>

    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<?php $this->beginBody() ?>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +38(000)000-00-00</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> seller@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
<!--                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="<?php echo \yii\helpers\Url::home()?>"><?php echo Html::img('@web/images/home/logo.png', ['alt' => 'E-SHOPPER'])?></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <?php if (!Yii::$app->user->isGuest):?>
                                <li>
                                    <a href="<?php echo  \yii\helpers\Url::to('/site/logout');?>"><i class="fa fa-user"></i>
                                    <?php echo Yii::$app->user->identity['username'];?>(Выход)
                                    </a>
                                </li>
                            <?php endif; ?>

<!--                            <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>-->
<!--                            <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>-->
                            <li><a href="#" onclick="return getCart()"><i class="fa fa-shopping-cart"></i> Корзина</a></li>
                            <li><a href="<?php echo \yii\helpers\Url::to('/admin' ) ?>"><i class="fa fa-lock"></i> Войти</a></li>
                            <li><a href="<?php echo \yii\helpers\Url::to('/site/signup/' ) ?>"><i class="fa fa-lock"></i> Регистрация</a></li>
                        </ul>

                        <?php
//                        NavBar::begin([
//                            'brandUrl' => Yii::$app->homeUrl,
//                            'options' => [
//                                'class' => 'navbar-inverse navbar-fixed-top',
//                            ],
//                        ]);
//                        echo Nav::widget([
//                            'items' => [
//                                Yii::$app->user->isGuest ? (
//                                ['label' => 'Login', 'url' => ['/site/signup']]
//                                ) : (
//                                    '<li>'
//                                    . Html::beginForm(['/site/logout'], 'post')
//                                    . Html::submitButton(
//                                        'Logout (' . Yii::$app->user->identity->username . ')',
//                                        ['class' => 'btn btn-link logout']
//                                    )
//                                    . Html::endForm()
//                                    . '</li>'
//                                )
//                            ],
//                        ]);
//
//                        NavBar::end();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="<?= \yii\helpers\Url::home()?>" class="active">На главную</a></li>
                            <li class="dropdown"><a href="#">Магазин<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">

                                    <li><a href="<?=\yii\helpers\Url::to(['category/about']) ?>">О магазине</a></li>
                                    <li><a href="<?=\yii\helpers\Url::to(['category/policy']) ?>">Оплата и доставка</a></li>
                                    <li><a href="#" onclick="return getCart()"><i class=""></i> Корзина</a></li>
                                    <li><a href="<?=\yii\helpers\Url::to(['/admin']) ?>">Войти</a></li>

                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Блог<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="to blog">Перейти в блог</a></li>
                                </ul>
                            </li>
                            <li><a href="contact-us.html">Контакты</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <form method="get" action="<?= \yii\helpers\Url::to(['category/search'])?>">
                            <input type="text" placeholder="Search" name="q">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

<?= $content ?>

<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">


            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget text-center">
                        <h2>Service</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Online Help</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Change Location</a></li>
                            <li><a href="#">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2018</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="">Andrey</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->


<?php
\yii\bootstrap\Modal::begin([
    'header' => '<h2>Корзина</h2>',
    'id' => 'cart',
    'size' => 'modal-lg',
    'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
        <a href="' . \yii\helpers\Url::to(['cart/view']) . '" class="btn btn-success">Оформить заказ</a>
        <button type="button" class="btn btn-danger" onclick="clearCart()">Очистить корзину</button>'
]);

\yii\bootstrap\Modal::end();

?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>