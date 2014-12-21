<?php

return CMap::mergeArray(
    [

        'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
        'name' => 'Домашние Финансы',

        'preload' => array('log'),


        'components' => [




        ]
    ],

    include 'main.php'
);