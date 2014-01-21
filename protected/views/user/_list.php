<ul class="well well-sm">
	<li><?php echo CHtml::encode($model->text) ?></li>
	<?php if(!Yii::app()->user->isGuest): ?>
	<li>
	<?php echo CHtml::ajaxLink('コピー', '/list/copy',
		array(
			'type'=>'POST',
			'data'=>'pk='.$model->id,
		),
		array(
			'rel'=>'popover',
			'class'=>'btn btn-primary btn-xs',
		)
	) ?>
	</li>
	<?php endif ?>
</ul>
