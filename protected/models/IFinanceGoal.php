<?php

interface IFinanceGoal {


    public function getName();

    public function getDescription();

    public function createNew($data);

    public function checkGoal($goal);

    public function getCreateViewName();


    public function getDetailViewName();
} 