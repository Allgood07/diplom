<?php

class m141221_155212_cron_job extends CDbMigration
{
	public function up()
	{

        $dirName = __DIR__;
        $dirName = explode(DIRECTORY_SEPARATOR, $dirName);
        array_pop($dirName);
        $dirName = implode('/', $dirName);
        $command = $dirName . "/yiic cron checkGoals";
        exec('crontab -l | { cat; echo "00 00 * * *  ' . $command . '"; } | crontab -');

	}

	public function down()
	{
		echo "m141221_155212_cron_job does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}