<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 10.03.18
 * Time: 12:01
 */

namespace app\models;
use Yii;
use yii\base\Model;
use app\models\User;

class SignupForm extends Model{

    public $username ;
    public $email;
    public $password;

    public $_user;

    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Пользователь уже существует.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Email уже существует .'],
            ['password', 'required'],
            ['password', 'string', 'min' => 4],
        ];
    }

    public function attributeLabels() {
        return [
            'username' => 'Имя пользователя',
            'email' => 'E-mail',
            'password' => 'Пароль'
        ];
    }

    public function signup()
    {

        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();

//        $auth = Yii::$app->authManager;
//        $editor = $auth->getRole('editor');
//        $auth->assign($editor, 2);

        return $user->save() ? $user : null;
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findOne($this->username);
        }

        return $this->_user;
    }

//
//    public function getUser(){
//       if (Yii::$app->request->post('username')) {
//           $q = Yii::$app->request->post('username');
//           User::find()->where(['like', 'username', $q])->all();
//           return true;
//       } else {
//           return false;
//       }
//    }
//
//    public function getEmail(){
//        if (Yii::$app->request->post('email')) {
//            $q = trim(Yii::$app->request->post('email'));
//            User::find()->where(['like', 'email', $q]);
//            return true;
//        } else {
//            return false;
//        }
//    }

}
