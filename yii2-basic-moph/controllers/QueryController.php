<?php
/**
 * Created by PhpStorm.
 * User: ohmmotta
 * Date: 3/11/15 AD
 * Time: 9:29 AM
 */
namespace app\controllers;

use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Query;
use yii\web\Controller;
use app\models\Contact;
use Yii;

class QueryController extends  Controller{
    public function actionQuery1(){
        $data = Contact::find()
            ->where('id'>2)
            ->orderBy('firstname','lastname')
        ;
        $dataProvider = new ActiveDataProvider([
            'query'=>$data,
        ]);

        return $this->render('query1',['dataProvider'=>$dataProvider]);
    }
    public function  actionQuery2(){
        $query = new Query;
        $query->select('*')->from('contact');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query2 = new Query;
        $query2->select('firstname,lastname')->from('contact');
        $dataProvider1 = new ActiveDataProvider([
            'query' => $query2,
        ]);

        return $this->render('query2',['dataProvider'=>$dataProvider,'contact'=>$dataProvider1]);
    }
    public function  actionQuery3(){
        $connection = Yii::$app->db;
        $contact = $connection
                    ->createCommand('SELECT * FROM contact')
                    ->queryall();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$contact,
            'pagination'=>[
                'pageSize'=>2
            ]
        ]);
        return $this->render('query3',['contact'=>$dataProvider]);
    }
}

?>
