<?php

spl_autoload_register(function ($className) {
   require_once 'app/lib/'.$className.'.php';
});
require_once 'app/controllers/BaseController.php';

include ("app/config/config.php");
$init = new Core();
