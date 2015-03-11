<?php
/**
 * Created by PhpStorm.
 * User: ohmmotta
 * Date: 3/11/15 AD
 * Time: 11:02 AM
 */
use yii\grid\GridView;


echo GridView::widget([
    'dataProvider'=>$contact,
]);
?>