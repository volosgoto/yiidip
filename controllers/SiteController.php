<?php

namespace app\controllers;

use app\models\SignupForm;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

/**
 * This is the model class for table "user".
 *
 * @property int $isAdmin
 */

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            $user = User::findByUsername($model->username);
            if ($user->isAdmin === 1) {
                $model->login();
                return $this->goBack();
            } else {
                $model->login();
                return $this->redirect('/user');
            }
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }


//    public function actionLogin()
//    {
//        if (!\Yii::$app->user->isGuest) {
//            return $this->goHome();
//        }
//
//        $model = new LoginForm();
//        if ($model->load(Yii::$app->request->post()) && $model->login()) {
//            return $this->goBack();
//        }
//        return $this->render('login', [
//            'model' => $model,
//        ]);
//    }



    public function actionSignup () {

        $model = new SignupForm();
        if (Yii::$app->user->isGuest) {
            if (Yii::$app->request->post() ) {
                $model->load(Yii::$app->request->post());
                $model->signup();

                    if (null !== Yii::$app->request->post('go_home-button')) {
                        return $this->goHome();
                    }
                    if (null !== Yii::$app->request->post('go_back-button')) {
                        return $this->goBack();
                    }
                        Yii::$app->session->setFlash('success', "Пользователь добавлен");
                        return $this->render('signup', compact('model'));

                } else {
                    return $this->render('signup', compact('model'));
                }
        }
        Yii::$app->session->removeFlash('success');
        $this->refresh();
    }




    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
