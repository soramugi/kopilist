<?php
/* @var $this CheckListController */
/* @var $model CheckList */
/* @var $form CActiveForm */
?>

<div class="row form-group">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'check-list-add-form',
	'action'=>'/list/add',
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="col-md-3">
		<?php echo $form->textField($model,'text',array('placeholder'=>'やりたい事','class'=>'form-control')); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="col-md-2 buttons">
		<?php echo CHtml::submitButton('Submit',array('class'=>'btn btn-block btn-lg btn-default')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form-group -->
