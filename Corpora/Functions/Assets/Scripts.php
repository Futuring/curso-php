<?php
namespace Corpora\Functions\Assets\Scripts {
    
    global $urls;
    $urls = [];
    
    /**
     * Adiciona endereço de CSS novo na URL
     */
    function addScript($url) 
    {
        global $urls;
        $urls[] = $url;
    }
    
    /**
     * 
     */
    function getStringScripts() 
    {   
        global $urls;
        $assets = [];
        
        foreach($urls as $value) {
            $assets[] = "<script type='text/javascript' src='{$value}' ></script>";
        }
        
        return implode(PHP_EOL, $assets);
    }
}