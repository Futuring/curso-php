<?php
return array(
    'databases' => array(
        'default' => 'mysql',
        
        'mysql' => array (
            'user' => 'root',
            'password' => 7654321,
            'db' => 'db01',
            'host' => '192.168.0.2',
            'charset'=> 'UTF-8'
        ),
        
        'pgsql' => array()
    ),
    'modules'   => array(
        '/financeiro' => 'Financeiro'
    )
);
