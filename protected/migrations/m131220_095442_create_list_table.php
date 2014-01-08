<?php

class m131220_095442_create_list_table extends CDbMigration
{
	public function safeUp()
	{
		if(Yii::app()->db->getDriverName()==='sqlite')
			$options=null;
		else
			$options='DEFAULT CHARSET=utf8 COLLATE=utf8_bin';
		$this->createTable('tbl_list', array(
			'id' => 'pk',
			'user_id' => 'int NOT NULL',
			'text' => 'string',
			'check' => 'int',
			'create_time' => 'datetime',
			'update_time' => 'datetime',
		), $options);
	}

	public function safeDown()
	{
		$this->dropTable('tbl_list');
	}
}
