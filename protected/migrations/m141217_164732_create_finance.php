<?php

class m141217_164732_create_finance extends CDbMigration
{
	public function up()
	{

        $this->execute('
            CREATE TABLE finance (

                id                   SERIAL,
                account_id           INT4                 NOT NULL,

                name                 VARCHAR(250)         NOT NULL,
                description          text,

                create_date          INT4                 NOT NULL,

                CONSTRAINT pk_finance PRIMARY KEY (id),
                CONSTRAINT fk_finance_account_id FOREIGN KEY (account_id) REFERENCES account (id)

            ) without oids;
        ');

	}

	public function down()
	{
		echo "m141217_164732_create_finance does not support migration down.\n";
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