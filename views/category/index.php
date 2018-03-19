<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
//$this->title = 'My Yii Application';
?>



<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Категории</h2>
                    <ul class="catalog category-products">
                        <?= \app\components\MenuWidget::widget(['tpl' => 'menu'])?>
                    </ul>
                    <h2>Все бренды</h2>
                    <ul class="catalog category-products">
                        <li>
                        <?php if (!empty($brands)): ?>
                            <?php foreach($brands as $brand): ?>
                            <p>
                                    <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $brand->id]) ?>"><?= $brand->name?></a>
                            </p>
                                <?php endforeach;?>
                        <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>



            <div class="col-sm-9 padding-right">
                <?php if( !empty($hits) ): ?>
                <?php  ?>
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Рекомендуемые товары</h2>
                        <?php foreach($hits as $hit): ?>
                            <?php $mainImg = $hit->getImage();?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <?= Html::img("{$mainImg->getUrl()}", ['alt' => $hit->name])?>
                                            <h2>$<?= $hit->price?></h2>
                                            <p>
                                                <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>"><?= $hit->name?></a>
                                            </p>
                                            <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $hit->id])?>" data-id="<?php echo $hit->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>

                                        </div>
                                        <?php if($hit->new): ?>
                                            <?= Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new'])?>
                                        <?php endif?>
                                        <?php if($hit->sale): ?>
                                            <?= Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'new'])?>
                                        <?php endif?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div><!--features_items-->
                <?php endif; ?>








            </div>
        </div>
    </div>
</section>