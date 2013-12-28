<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Login</h1>

<?php echo CHtml::link(CHtml::image('images/sign-in-with-twitter-gray.png'),'site/twitterLogin'); ?>
