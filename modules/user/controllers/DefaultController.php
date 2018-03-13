<?php

namespace app\modules\user\controllers;

use yii\web\Controller;
use app\modules\user\models\User;

/**
 * Default controller for the `user` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $user = new User();
        $v = get_class_methods($user);
        return $this->render('index', compact('user', 'v'));
    }
}
