<?php
use yii\widgets\DetailView;

echo DetailView::widget([
	'model'=>$model,
	'attributes'=>[
		'firstname',
		'lastname',
		'address:html',
		// :html Don't Cut Tag HTML
		'email'
	]
]);