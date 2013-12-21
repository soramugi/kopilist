<?php
/* @var $this CheckListController */
/* @var $models CheckList[] */

$this->breadcrumbs=array(
	'CheckList',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>

<div class="checkList">
	<?php foreach($models as $model): ?>
		<div class="list">
			<?php echo $model->text ?>
		</div>
	<?php endforeach ?>
</div>
