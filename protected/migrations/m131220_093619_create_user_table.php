<?php

class m131220_093619_create_user_table extends CDbMigration
{
	public function safeUp()
	{
		if(Yii::app()->db->getDriverName()==='sqlite')
			$options=null;
		else
			$options='DEFAULT CHARSET=utf8 COLLATE=utf8_bin';

		$this->createTable('tbl_user', array(
			'id' => 'pk',
			'name' => 'string NOT NULL',
			'img_url' => 'string',
			'create_time' => 'datetime',
		), $options);
		$this->createTable('tbl_login', array(
			'id' => 'pk',
			'user_id' => 'int NOT NULL',
			'hash' => 'string NOT NULL',
			'type' => 'string',
			'create_time' => 'datetime',
		), $options);
	}

	public function safeDown()
	{
		$this->dropTable('tbl_user');
		$this->dropTable('tbl_login');
	}
}
