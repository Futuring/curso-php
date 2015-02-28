<?php
namespace Corpora\Functions\Assets\Styles {
    
    global $urls;
    $urls = [];
    
    /**
     * Adiciona endereço de CSS novo na URL
     */
    function addAsset($url) 
    {
        global $urls;
        $urls[] = $url;
    }
    
    /**
     * 
     */
    function getStringAssets() 
    {   
        global $urls;
        $assets = [];
        
        foreach($urls as $value) {
            $assets[] = "<link rel='stylesheet' href='{$value}' />";
        }
        
        return implode(PHP_EOL, $assets);
    }
}