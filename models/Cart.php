<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 15.02.18
 * Time: 10:16
 */

namespace app\models;



use yii\db\ActiveRecord;

class Cart extends ActiveRecord {

    public function addToCart($product, $qty = 1) {
        echo 'Worked!';
    }
}