<?php

class m141217_172858_create_finance_commit extends CDbMigration
{
    public function up()
    {
        $this->execute('
            CREATE TABLE finance_commit (

                id                   SERIAL,
                finance_id           INT4    NOT NULL,

                type                 INT4    NOT NULL,
                value          INT4,

                description          text,

                create_date          INT4                 NOT NULL,

                CONSTRAINT pk_finance_commit PRIMARY KEY (id),
                CONSTRAINT fk_finance_commit_finance_id FOREIGN KEY (finance_id) REFERENCES finance (id)

            ) without oids;
        ');


    }

    public function down()
    {
        echo "m141217_172858_create_finance_commit does not support migration down.\n";
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