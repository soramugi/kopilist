<p>
<?php echo CHtml::encode($model->text) ?>
<?php if(!Yii::app()->user->isGuest): ?>

<?php echo CHtml::ajaxLink('コピー', '/list/copy',
	array(
		'type'=>'POST',
		'data'=>'pk='.$model->id,
	),
	array(
		'rel'=>'popover',
	)
) ?>
<?php endif ?>
</p>
