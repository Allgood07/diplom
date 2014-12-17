<?php

class m141217_183348_create_finance_goals extends CDbMigration
{
	public function up()
	{

        $this->execute('
            CREATE TABLE finance_goal (

                id                   SERIAL,
                finance_id           INT4    NOT NULL,

                type                 INT4    NOT NULL,
                data          text,

                description          text,

                state                INT4,

                create_date          INT4                 NOT NULL,

                CONSTRAINT pk_finance_goal PRIMARY KEY (id),
                CONSTRAINT fk_finance_goal_finance_id FOREIGN KEY (finance_id) REFERENCES finance (id)

            ) without oids;
        ');


	}

	public function down()
	{
		echo "m141217_183348_create_finance_goals does not support migration down.\n";
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