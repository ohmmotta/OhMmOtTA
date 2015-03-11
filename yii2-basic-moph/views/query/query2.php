<?php
/**
 * Created by PhpStorm.
 * User: ohmmotta
 * Date: 3/11/15 AD
 * Time: 9:35 AM
 */
use yii\grid\GridView;

echo GridView::widget([
    'dataProvider'=>$dataProvider,
    'options'=>['class'=>'table-responsive',
                'id'=>'my-table']
]);

echo GridView::widget([
    'dataProvider'=>$contact,
    'options'=>['class'=>'table-responsive',
        'id'=>'my-table']
]);
?>