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



    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

//    public function behaviors()
//    {
//        return [
//            'access'    =>  [
//                'class' =>  AccessControl::className(),
//                'denyCallback'  =>  function($rule, $action)
//                {
//                    throw new \yii\web\NotFoundHttpException();
//                },
//                'rules' =>  [
//                    [
//                        'allow' =>  true,
//                        'matchCallback' =>  function($rule, $action)
//                        {
//                            return User::find()->where(['isAdmin' => 1])->one();
//                        }
//                    ]
//                ]
//            ]
//        ];
//    }

//    public function getUser() {
//        return $this->adminUser = User::findOne(['id' => 1]);
//    }

}
