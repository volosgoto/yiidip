<?php

namespace app\modules\admin;
use yii\filters\AccessControl;
use Yii;
use app\modules\admin\rbac\Rbac;
use app\models\User;
use app\models\LoginForm;
/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
//    public $adminUser;

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
//        $this->getUser();
    }



//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'rules' => [
//                    [
//                        'allow' => true,
//                        'roles' => ['@'],
////                        'user' => ['admin']
//                    ],
//                ],
//            ],
//        ];
//    }

    public function behaviors()
    {
        return [
            'access'    =>  [
                'class' =>  AccessControl::className(),
//                'denyCallback'  =>  function($rule, $action)
//                {
//                    throw new \yii\web\NotFoundHttpException('Пользователь не найден');
//                },

                'rules' =>  [
                    [
                        'allow' =>  true,
                        'roles' => ['@'],
                        'matchCallback' =>  function($rule, $action)
                        {

                            if (!Yii::$app->user->isGuest) {
                                $user = Yii::$app->user->getIdentity()->getIsAdmin();
                                if ($user === 1) {
                                    return true;
                                } else {
                                    throw new \yii\web\NotFoundHttpException('Пользователь не найден');
                                }
                            }


                        }
                    ]
                ]
            ]
        ];
    }

//    public function getUser() {
//        return $this->adminUser = User::findOne(['id' => 1]);
//    }

}
