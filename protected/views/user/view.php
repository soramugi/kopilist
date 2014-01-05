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
<?php $this->renderPartial('/user/_list',array('model'=>$checkLIst,)); ?>
<?php endforeach ?>
</div>
<h3>やったこと(20件まで)</h3>
<div>
<?php foreach($user->checkListDone(20) as $checkLIst): ?>
<?php $this->renderPartial('/user/_list',array('model'=>$checkLIst,)); ?>
<?php endforeach ?>
</div>
