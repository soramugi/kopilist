<?php

class m131228_152614_create_login_twitter extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		if(Yii::app()->db->getDriverName()==='sqlite')
			$options=null;
		else
			$options='DEFAULT CHARSET=utf8 COLLATE=utf8_bin';
		$this->createTable('tbl_login_twitter', array(
			'id' => 'pk',
			'user_id' => 'int',
			'tw_user_id' => 'int NOT NULL',
			'screen_name' => 'string NOT NULL',
			'oauth_token' => 'string NOT NULL',
			'oauth_token_secret' => 'string NOT NULL',
			'create_time' => 'datetime',
		), $options);
	}

	public function safeDown()
	{
		$this->dropTable('tbl_login_twitter');
	}
}
