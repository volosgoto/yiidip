<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 06.02.18
 * Time: 10:01
 */

namespace app\components;

use yii\base\Widget;

class MenuWidget extends Widget {

    public $tpl;

    public function init() {
        parent::init();
        if ($this->tpl === null) {
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }

    public function run() {
        return $this->tpl;
    }

}