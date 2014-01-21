<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="jp" />
		<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" />

		<!-- blueprint CSS framework -->
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/flat-ui.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />

		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	</head>

	<body>

		<div id="wrap">

			<div id="mainmenu" class="navbar navbar-inverse">
				<?php $this->widget('zii.widgets.CMenu',array(
						'htmlOptions' => array('class'=>'nav navbar-nav navbar-left'),
						'items'=>array(
							array('label'=>CHtml::encode(Yii::app()->name), 'url'=>array('/')),
							array('label'=>'Home', 'url'=>array('/site/index')),
							array('label'=>'List', 'url'=>array('/list/index'), 'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'@'.Yii::app()->user->name, 'url'=>array('/user/'.Yii::app()->user->id), 'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
							array('label'=>'Logout', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
						),
					)
				); ?>
			</div><!-- mainmenu -->

			<div class="container " id="page">
				<?php if(isset($this->breadcrumbs)):?>
				<?php $this->widget('zii.widgets.CBreadcrumbs', array(
						'links'=>$this->breadcrumbs,
					)
				); ?><!-- breadcrumbs -->
				<?php endif?>

				<?php echo $content; ?>

				<div class="clear"></div>

			</div><!-- page -->

			<div id="push"></div>
		</div><!-- wrap -->

		<footer id="footer" class="nav">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
		<a href="https://pagodabox.com">pagodabox</a>.
		<a href="http://designmodo.github.io/Flat-UI/">Flat-UI</a>.
		</footer>

		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
						(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
					m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-43044942-9', 'gopagoda.com');
			ga('send', 'pageview');

		</script>

	</body>
</html>
