<?php

namespace app\modules\user\models;

use app\models\Order;
use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $auth_key
 * @property string $email
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property int $isAdmin
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user';
    }

    public function getOrders(){
        return $this->hasMany(Order::className(), ['order_id' => 'id']);
    }

    public function getUser() {
        return $this->hasOne(User::className(), ['id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
//            ['username', 'required'],
//            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Пользователь уже существует.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
//            ['email', 'required'],
            ['email', 'trim'],
            ['email', 'string', 'max' => 255],
//            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Email уже существует .'],
            ['password', 'required'],
            ['password', 'string', 'min' => 4],
            ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'username' => 'Имя',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isAdmin' => 'Is Admin',
        ];
    }


    /**
     * @inheritdoc
     *
     *
     *
     *
     */


    public static function findIdentity($id) {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
//        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param  string $username
     * @return static|null
     */
    public static function findByUsername($username) {
        return static::findOne(['username' => $username]);
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password) {
//        return $this->password === $password;
        return \Yii::$app->security->validatePassword($password, $this->password);
    }

    public function generateAuthKey() {
        $this->auth_key = \Yii::$app->security->generateRandomString();
    }

    public function setPassword($password) {
        $passwordToHash = Yii::$app->security->generatePasswordHash($password);
        return $this->password = $passwordToHash;
    }

//    public function isAdmin($model) {
//
//       if (User::find()->where(['isAdmin' => 1])->one()) {
//           return true;
//       };
//       return false;
//    }
    public function getIsAdmin() {
        return $this->isAdmin;
    }
}



