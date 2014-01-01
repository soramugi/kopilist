<?php
/* @var $this UserController */

$this->breadcrumbs=array(
	'User',
	$user->id
);
?>
<h1><?php echo $user->name; ?></h1>

<h3>やること</h3>
<div>
<?php foreach($user->checkList() as $checkLIst): ?>
	<p><?php echo CHtml::encode($checkLIst->text) ?></p>
<?php endforeach ?>
</div>
<h3>やったこと</h3>
<div>
<?php foreach($user->checkListDone(20) as $checkLIst): ?>
	<p><?php echo CHtml::encode($checkLIst->text) ?></p>
<?php endforeach ?>
</div>
