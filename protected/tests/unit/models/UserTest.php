<?php
class UserTest extends CDbTestCase
{
	public $fixtures=array(
		'user'=>'User',
		'checkList'=>'CheckList',
	);

	public function testFind()
	{
		$user=User::model()->findByAttributes(
			array('name'=>$this->user[1]['name'])
		);
		$this->assertInstanceOf('User', $user);
	}

	/**
		@test
	 */
	public function checkList()
	{
		$user=$this->user[1];
		$checkList=array();
		foreach($this->checkList as $_checkList){
			if($_checkList['user_id']==$user['id'] && $_checkList['check']==0)
				$checkList[]=$_checkList;
		}

		$user=User::model()->findByAttributes(
			array('name'=>$user['name'])
		);
		$checkList=$user->checkList();

		$this->assertCount(count($checkList), $checkList);
	}

	/**
		@test
	 */
	public function checkListDone()
	{
		$user=$this->user[1];
		$checkList=array();
		foreach($this->checkList as $_checkList){
			if($_checkList['user_id']==$user['id'] && $_checkList['check']==1)
				$checkList[]=$_checkList;
		}

		$user=User::model()->findByAttributes(
			array('name'=>$user['name'])
		);
		$checkList=$user->checkListDone();

		$this->assertCount(count($checkList), $checkList);
	}
}
