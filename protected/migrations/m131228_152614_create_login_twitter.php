<?php

class m131228_152614_create_login_twitter extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('tbl_login_twitter', array(
			'id' => 'pk',
			'user_id' => 'int',
			'tw_user_id' => 'int NOT NULL',
			'screen_name' => 'string NOT NULL',
			'oauth_token' => 'string NOT NULL',
			'oauth_token_secret' => 'string NOT NULL',
			'create_time' => 'datetime',
		), 'DEFAULT CHARSET=utf8 COLLATE=utf8_bin');
	}

	public function safeDown()
	{
		$this->dropTable('tbl_login_twitter');
	}
}
