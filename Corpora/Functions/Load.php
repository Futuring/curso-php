<?php
namespace Corpora\Functions {
    /**
     * Função que faz require dos arquivos do namespace dentro de 
     * /Functions
     */
    function load($nameSpace, $arquivo) 
    {
        $dir = __DIR__.DIRECTORY_SEPARATOR
              .ucfirst($nameSpace).DIRECTORY_SEPARATOR
              .ucfirst($arquivo).".php";
        
        require_once $dir;
    }
}