<?php

class m131230_143303_not_require_check_list_user_id extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->dropTable('tbl_check_list');
		$this->createTable('tbl_check_list', array(
			'id' => 'pk',
			'user_id' => 'int',
			'text' => 'string',
			'check' => 'int',
			'create_time' => 'datetime',
			'update_time' => 'datetime',
		));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_check_list');
		$this->createTable('tbl_check_list', array(
			'id' => 'pk',
			'user_id' => 'int NOT NULL',
			'text' => 'string',
			'check' => 'int',
			'create_time' => 'datetime',
			'update_time' => 'datetime',
		));
	}
}
