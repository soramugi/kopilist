<?php

class m131228_151340_drop_login extends CDbMigration
{
	public function safeUp()
	{
		$this->dropTable('tbl_login');
	}

	public function safeDown()
	{
		if(Yii::app()->db->getDriverName()==='sqlite')
			$options=null;
		else
			$options='DEFAULT CHARSET=utf8 COLLATE=utf8_bin';
		$this->createTable('tbl_login', array(
			'id' => 'pk',
			'user_id' => 'int NOT NULL',
			'hash' => 'string NOT NULL',
			'type' => 'string',
			'create_time' => 'datetime',
		), $options);
	}
}
