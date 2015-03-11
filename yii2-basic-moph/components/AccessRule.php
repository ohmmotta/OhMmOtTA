<?php
/**
 * Created by PhpStorm.
 * User: ohmmotta
 * Date: 3/11/15 AD
 * Time: 1:55 PM
 */
namespace app\components;

use yii\filters\AccessRule as AccessRuleUse;
class AccessRule extends AccessRuleUse{
    protected function matchRole($user){
        if(empty($this->roles)) {
            return true;
        }
        foreach($this->roles as $role){
            if($role === '?'){
                if($user->getIsGuest()){
                    return true;
                }
                elseif($role === '@'){
                    return true;
                }
                elseif(!$user->getIsGuest() && $role === $user->identity->role){
                    return true;
                }
            }
        }
    }
}
?>