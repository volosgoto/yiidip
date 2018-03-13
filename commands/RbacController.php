<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 13.03.18
 * Time: 11:23
 */

namespace app\commands;


use Yii;
use yii\console\Controller;
/**
 * Инициализатор RBAC выполняется в консоли php yii rbac/init
 */
class RbacController extends Controller {

    public function actionInit() {
        $auth = Yii::$app->authManager;
        $user = $auth->createRole('user');
        $user->description = 'User';
        $auth->add($user);

        $admin = $auth->createRole('admin');
        $admin->description = 'Admin';
        $auth->add($admin);

        $auth->addChild($admin, $user);
        $auth->assign($admin, $admin);

    }
}