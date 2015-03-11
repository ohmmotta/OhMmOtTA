<?php
namespace app\models;

// if Don't use use 
//class PersonForm extends yii\base\Model{}

use yii\base\Model;
class PersonForm extends Model{
	// Create Attibute 
	public $firstname;
	public $lastname;
	public $address;
	public $email;
	
	// Create Attibute LABEL
	public function attributeLables(){
		return [
			'firstname' => 'ชื่อ',
			'lastname' => 'นามสกุล',
			'address' => 'ที่อยู่',
			'email' => 'อีเมลล์'
		];
		
	}
	// Create rules Of Attibute
	public function rules(){
		return [
			[['firstname','lastname','address','email'],'required'],
			['address','string'],
			['email','email']
		];	
		
	}
}

?>
