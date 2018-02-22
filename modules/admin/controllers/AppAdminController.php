<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 21.02.18
 * Time: 11:15
 */

namespace app\modules\admin\controllers;
use yii\web\Controller;
use yii\filters\AccessControl;

class AppAdminController extends Controller {
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ]
        ];
    }
}