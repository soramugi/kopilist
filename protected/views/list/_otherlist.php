<h3>他人の完了リスト</h3>
<?php foreach ($models as $model): ?>
<div>
	<p><?php echo CHtml::link($model->user->name,'/user/'.$model->user->id )?>さん</p>
	<p><?php echo CHtml::encode($model->text) ?>

<?php echo CHtml::ajaxLink('コピー', '/list/copy',
	array(
		'type'=>'POST',
		'data'=>'pk='.$model->id,
	),
	array(
		'rel'=>'popover',
	)
) ?>
	</p>
	<p><?php echo date('Y-m-d H:i:s',$model->update_time) ?></p>
</div>
<?php endforeach ?>
