<?php
class CheckListTest extends CDbTestCase
{
	public $fixtures=array(
		'user'=>'User',
		'checkList'=>'CheckList',
	);

	public function testFind()
	{
		$checkList=CheckList::model()->findByPk(1);
		$this->assertInstanceOf('CheckList', $checkList);
	}

	public function testCreate()
	{
		// loginしないと登録できない
		$checkList = new CheckList;
		$text='mannmannnmannnmannn日本語';
		$checkList->text=$text;
		$checkList->save();
		$_checkList=CheckList::model()->findByAttributes(
			array('text'=>$text)
		);
		$this->assertNull($_checkList);


		// loginしていれば登録時にuser_idが入る

		// login処理
		$loginTwitter=LoginTwitter::model()->findByPk(1);
		$identity=new UserIdentity($loginTwitter);
		$identity->authenticate();
		$duration=3600*24*30;
		Yii::app()->user->login($identity,$duration);

		$checkList = new CheckList;
		$text='hoooooooooooooogeeeeeeeeeeeeee123455日本語';
		$checkList->text=$text;
		$checkList->save();
		$_checkList=CheckList::model()->findByAttributes(
			array('text'=>$text)
		);
		$this->assertEquals($checkList->id,$_checkList->id);

		$this->assertEquals($loginTwitter->user_id,$_checkList->user_id);
	}

	/**
		@test
	 */
	public function notDone()
	{
		$user=$this->user[1];
		$checkList=array();
		foreach($this->checkList as $_checkList){
			if($_checkList['user_id']==$user['id'] && $_checkList['check']==0)
				$checkList[]=$_checkList;
		}

		$checkList=CheckList::model()->notDone($user['id']);

		$this->assertCount(count($checkList), $checkList);
	}

	/**
		@test
	 */
	public function done()
	{
		$user=$this->user[1];
		$checkList=array();
		foreach($this->checkList as $_checkList){
			if($_checkList['user_id']==$user['id'] && $_checkList['check']==1)
				$checkList[]=$_checkList;
		}

		$checkList=CheckList::model()->done($user['id']);

		$this->assertCount(count($checkList), $checkList);
	}
}
