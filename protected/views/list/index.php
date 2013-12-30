<?php
/* @var $this ListController */

$this->breadcrumbs=array(
	'List',
);
?>

<?php foreach($models as $_model): ?>
<p><?php echo CHtml::encode($_model->text) ?></p>
<?php endforeach ?>

<?php $this->renderPartial('/list/_form',array(
	'model'=>$model,
)); ?>
