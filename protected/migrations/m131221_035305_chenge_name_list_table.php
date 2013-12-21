<?php

class m131221_035305_chenge_name_list_table extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->renameTable('tbl_list', 'tbl_check_list');
	}

	public function safeDown()
	{
		$this->renameTable('tbl_check_list', 'tbl_list');
	}
}
