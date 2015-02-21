<?php
namespace DataBase {
    
    function getConfiguracoes($database = null) {
        $config = require_once("config.php");
        
        if(! isset($database)) {
            $default = $config['databases']['default'];
            if ( isset($config['databases'][$default]) ) {
                return $config['databases'][$default];
            } else {
                return 'Não existe configuração';
            }
        } else {
            
            if(isset($config['databases'][$database])) {
                return $config['databases'][$database];
            } else {
                return 'Não existe configuração';
            }
               
        }
    }
    
} 

namespace Mysql {

    function connect()
    {
        var_dump(\DataBase\getConfiguracoes());
    }
    
}

namespace Pgsql 
{
    
    function connect() 
    {
        var_dump(\DataBase\getConfiguracoes("pgsql"));
    }
}



