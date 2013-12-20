<?php

class m131220_093619_create_user_table extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_user', array(
			'id' => 'pk',
			'name' => 'string NOT NULL',
			'img_url' => 'string',
			'create_time' => 'datetime',
		));
		$this->createTable('tbl_login', array(
			'id' => 'pk',
			'user_id' => 'int NOT NULL',
			'hash' => 'string NOT NULL',
			'type' => 'string',
			'create_time' => 'datetime',
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_user');
		$this->dropTable('tbl_login');
	}
}
