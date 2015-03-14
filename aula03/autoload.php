<?php
spl_autoload_register(
  function ($pClassName) {
  	require_once(str_replace("\\", "/", $pClassName).".php");
  }
);	