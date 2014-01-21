<?php
	/* @var $this ListController */

	$this->breadcrumbs=array(
		'List',
	);
?>

<div id="mylist">

	<?php foreach($models as $_model): ?>

	<label class="checkbox" for="checkbox<?php echo $_model->id ?>">
		<?php echo CHtml::checkbox('check_list', false, array(
				'id'=>"checkbox{$_model->id}",
				'data-toggle'=>'checkbox',
				'value'=>$_model->id,
			)
		); ?>
		<?php echo CHtml::encode($_model->text) ?>
	</label>
	<?php endforeach ?>

	<?php $this->renderPartial('/list/_form',array('model'=>$model,)); ?>

</div>

<?php $this->renderPartial('/list/_otherlist',array('models'=>$otherModels,)); ?>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/flatui-checkbox.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>

<script type="text/javascript">
	$(function() {
			$(".checkbox").click(function() {
					$.post(
						"check",
						{pk : $('input',this).attr("value")}
					);
			});

			var link = $('a[rel=popover]');
			link.popover({
					html: 'true',
					content: '<small style="font-size:50%;">コピっ!</small>'
				}).click(function () {
					setTimeout(function () {
							link.popover('hide');
					}, 1000);
					;
			});
	});
</script>
