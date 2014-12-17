<?php

class FinanceState extends FinanceStateTable
{


    public static function model($className = __CLASS__)
    {
        return parent::model($className);

    }

    /**
     * @param $commit FinanceCommit
     */
    public function changeValue($commit){

        if($commit->type == FinanceCommit::ADD){

            $this->value += $commit->value;

        }else if($commit->type == FinanceCommit::SPEND){

            $this->value -= $commit->value;

        }

    }

}