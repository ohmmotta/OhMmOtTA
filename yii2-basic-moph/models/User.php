<?php
/**
 * Created by PhpStorm.
 * User: ohmmotta
 * Date: 3/11/15 AD
 * Time: 11:48 AM
 */
namespace app\models;


use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use Yii;

class User extends ActiveRecord implements IdentityInterface{

    // initial Value Default 1
    const  STATUS_NOTACTIVE = 0;
    const  STATUS_ACTIVE = 1;
    //Permission Default 1
    const  ROLE_USER = 1;
    const  ROLE_MANAGER = 5;
    const  ROLE_ADMIN = 10;


    public static function tableName(){
        return 'user';
    }
    public function rules(){
        return [
            ['status','default','value'=>self::STATUS_ACTIVE],
            ['status','in','range'=>[self::STATUS_ACTIVE,self::STATUS_NOTACTIVE]],
            ['role','default','value'=>self::ROLE_USER],
            ['role','in','range'=>[self::ROLE_USER,self::ROLE_MANAGER,self::ROLE_ADMIN]],
            [['username','email'],'unique'],
            [['username','password_hash'],'required']
        ];
    }
    public function attributeLabels(){
        return [
            'username'=>'ชื่อผู้ใช้งาน',
            'password_hash'=>'รหัสผ่าน',
        ];
    }

    public static function findByUsername($username){
        return static::findOne(['username'=>$username,'status'=>self::STATUS_ACTIVE]);
    }
    public function validatePassword($password){
        return Yii::$app->security->validatePassword($password,$this->password_hash);
        //return md5($password)===$this->password_hash;
    }


    ###### Interface Method ########
    public static function findIdentity($id)
    {
        // TODO: Implement findIdentity() method.
        return static::findOne(['id'=>$id,'status'=>self::STATUS_ACTIVE]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getId()
    {
        // TODO: Implement getId() method.
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }


}