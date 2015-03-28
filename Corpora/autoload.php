<?php
spl_autoload_register(
  function ($pClassName) {

  	$fileName = str_replace("\\", "/", $pClassName).".php";
  	
	if (file_exists(__DIR__."/".$fileName)) {
  		require_once($fileName);
  	}

  }
);	