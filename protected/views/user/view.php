<?php
	/* @var $this UserController */

	$this->breadcrumbs=array(
		'User',
		$user->id
	);
?>
<h1><?php echo $user->name; ?></h1>

<div id='do-list' class="multiple-lines panel panel-info">
	<div class="panel-heading">
		<h3 class ="panel-title">やること</h3>
	</div>
	<div class="panel-body">
		<?php foreach($user->checkList() as $checkLIst): ?>
		<?php $this->renderPartial('/user/_list',array('model'=>$checkLIst,)); ?>
		<?php endforeach ?>
	</div>
</div>
<div id="done-list" class="multiple-lines panel panel-info">
	<div class="panel-heading">
		<h3 class ="panel-title">やったこと(20件まで)</h3>
	</div>
	<div class="panel-body">
		<?php foreach($user->checkListDone(20) as $checkLIst): ?>
		<?php $this->renderPartial('/user/_list',array('model'=>$checkLIst,)); ?>
		<?php endforeach ?>
	</div>
</div>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>

<script>
	jQuery(function($){
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
