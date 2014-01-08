<?php

class m131230_143303_not_require_check_list_user_id extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		if(Yii::app()->db->getDriverName()==='sqlite')
			$options=null;
		else
			$options='DEFAULT CHARSET=utf8 COLLATE=utf8_bin';
		$this->dropTable('tbl_check_list');
		$this->createTable('tbl_check_list', array(
			'id' => 'pk',
			'user_id' => 'int',
			'text' => 'string',
			'check' => 'int',
			'create_time' => 'datetime',
			'update_time' => 'datetime',
		), $options);
	}

	public function safeDown()
	{
		if(Yii::app()->db->getDriverName()==='sqlite')
			$options=null;
		else
			$options='DEFAULT CHARSET=utf8 COLLATE=utf8_bin';
		$this->dropTable('tbl_check_list');
		$this->createTable('tbl_check_list', array(
			'id' => 'pk',
			'user_id' => 'int NOT NULL',
			'text' => 'string',
			'check' => 'int',
			'create_time' => 'datetime',
			'update_time' => 'datetime',
		), $options);
	}
}
