<?php
	/* @var $this SiteController */

	$this->pageTitle=Yii::app()->name;
?>

<h1><?php echo CHtml::encode(Yii::app()->name); ?></h1>

<p>やりたい事リスト共有サービス、<i>Kopi List</i>にようこそ。</p>

<h3><?php echo CHtml::encode(Yii::app()->name); ?>の使い方</h3>
<ul>
	<li>Twitterアカウントを使ってログインしてください。</li>
	<li>「今晩の買い物リスト」「死ぬまでにしたい事リスト」どんどん書き出していって見てください。</li>
	<li>他の人のリストを覗いてみましょう。真似したいやりたい事があったら「コピー」のボタンで自分のリストにコピーしよう。</li>
</ul>

<h3><?php echo CHtml::encode(Yii::app()->name); ?>の開発に参加しよう</h3>
<p><?php echo CHtml::encode(Yii::app()->name); ?>はオープンソースです。</p>
<p>「こんな機能が欲しい」「ここが使いにくい」等あれば報告、もしくは修正パッチを追加した物をPull Requestしてみてください。</p>
<?php echo CHtml::link('soramugi/kopilist - GitHub','https://github.com/soramugi/kopilist')?>
