<?php
/* @var $this ListController */

$this->breadcrumbs=array(
	'List',
);
?>

<?php foreach($models as $_model): ?>
	<p>
		<?php echo CHtml::checkbox('check_list', false, array(
			'id'=>"cb{$_model->id}",
			'ajax'=>array(
				'type'=>'POST',
				'url'=>'check',
				'data'=>array('pk'=>$_model->id),
				'success'=>"function(data){
					var cb=$('#cb{$_model->id}');
					cb.attr('checked', !cb.is(':checked'));
				}",
			))); ?>
		<?php echo CHtml::encode($_model->text) ?>
	</p>
<?php endforeach ?>

<?php $this->renderPartial('/list/_form',array('model'=>$model,)); ?>
