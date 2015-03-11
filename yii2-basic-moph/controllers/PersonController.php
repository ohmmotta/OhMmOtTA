<?php
namespace app\controllers;

use yii\web\Controller;
// import app\models\PersonForm;
use app\models\PersonForm;
use yii;

class PersonController extends Controller{
	// actionTest -> File render is name <<<< Test >>>>
	// Can set parameter $name to method และ ต่อท้าย url ด้วย &name=xxxxx 
	public function actionTest($name){
		//$name = "Ratchamongkol Plunsungkate";
		//$name = $this->getName();
		return $this->render('test',['myname'=>$name]);
		//test is test.php in new folder person AT view ;
		//['myname'=>$name]  valiable myname is new valiable = $name on controller and Sent to view page;
	}
	
	public function actionPerson(){
		$model = new PersonForm;
		if($model->load(Yii::$app->request->post())){
			$value = $_POST['PersonForm'];
		}
		else{
			$value = null;
		}
		return $this->render('person',['model'=>$model,'value'=>$value]);
	}
	
	public function getName(){
		$name = "Ratchamongkol Plunsungkate";
		return $name;
	}
	
}	
?>