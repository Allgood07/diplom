<?php

class m141214_164034_go extends CDbMigration
{
	public function up()
	{

        $this->execute('

        CREATE TABLE account (

              id                SERIAL,

              email             VARCHAR(50)       not null,
              pass              VARCHAR(32)       not null,
              salt              VARCHAR(32)       not null,

              first_name        VARCHAR(50),
              last_name         VARCHAR(50),
              middle_name       VARCHAR(50),

              reg_date          INT4              not null,

              is_admin          INT2,

              CONSTRAINT pk_account PRIMARY KEY (id)

            ) without oids;

        ');

	}

	public function down()
	{
		echo "m141214_164034_go does not support migration down.\n";
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