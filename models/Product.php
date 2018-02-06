<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 06.02.18
 * Time: 9:47
 */

namespace app\models;
use yii\db\ActiveRecord;

class Product extends ActiveRecord {
    public static function tableName() {
        return 'product';
    }
}