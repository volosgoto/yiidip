<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
?>
<section>
    <div class="container">
        <div class="row">
            <div class="left-sidebar">
                <h2>Контакты</h2>
                <ul class="catalog category-products">
                    <p>    A ab ipsum libero obcaecati sed? Aliquid dicta dolorum eaque explicabo laboriosam necessitatibus rem saepe similique sint temporibus! Mollitia quaerat tempore voluptatibus.
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam architecto beatae blanditiis, dicta esse labore nulla quae quasi, quibusdam quos repellat sequi sunt suscipit tempora tempore ullam unde voluptates voluptatum.
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias at beatae eos iste obcaecati quibusdam soluta ut, voluptas? Adipisci alias commodi dolores explicabo fuga illo omnis praesentium quisquam vitae voluptatibus.
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium amet asperiores atque cumque dignissimos, eaque est excepturi explicabo facere, labore maiores officia omnis placeat quibusdam quidem rem repellat sapiente tempora!
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquam consequatur eaque eius porro, provident tempore. Aperiam asperiores autem commodi dolorum facere id ipsum minima quibusdam, saepe suscipit tenetur vel.
                    </p>
                </ul>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Категории</h2>
                    <ul class="catalog category-products">
                        <?= \app\components\MenuWidget::widget(['tpl' => 'menu'])?>
                    </ul>
                </div>
            </div>


        </div>
    </div>
</section>