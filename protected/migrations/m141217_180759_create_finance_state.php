<?php

class m141217_180759_create_finance_state extends CDbMigration
{
    public function safeUp()
    {
        $this->execute('
            CREATE TABLE finance_state (

                id                   SERIAL,
                finance_id           INT4    NOT NULL,

                value          INT4,

                CONSTRAINT pk_finance_state PRIMARY KEY (id),
                CONSTRAINT fk_finance_state_finance_id FOREIGN KEY (finance_id) REFERENCES finance (id)

            ) without oids;
        ');

    }

    public function down()
    {
        echo "m141217_180759_create_finance_state does not support migration down.\n";
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