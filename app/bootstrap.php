<?php
define("WORKING_DIRECTORY",realpath(dirname(__FILE__)."/../"));
define("TMP",realpath(dirname(__FILE__)."/../tmp"));

//include path
set_include_path(get_include_path().PATH_SEPARATOR.WORKING_DIRECTORY."/library");

//Initial Conf
$aConf = parse_ini_file("configs/config.ini");

require_once 'Autoload.php';
spl_autoload_register('Autoload::loadClass');

App::getApp()->setConfig($aConf)->run();
