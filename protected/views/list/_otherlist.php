<div id="otherlist" class="multiple-lines panel panel-info">
	<div class="panel-heading">
		<h3 class ="panel-title">他人の完了リスト</h3>
	</div>
	<div class="panel-body">
		<?php foreach ($models as $model): ?>
		<ul class="well well-sm">
			<li><?php echo CHtml::link($model->user->name,'/user/'.$model->user->id )?>さん</li>
			<li><?php echo CHtml::encode($model->text) ?></li>

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
			<li><?php echo date('Y-m-d H:i:s',$model->update_time) ?></li>
		</ul>
		<?php endforeach ?>
	</div>
</div>
