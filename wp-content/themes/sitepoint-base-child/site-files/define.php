<?php
if ( ! defined("DS")) {
	define("DS", DIRECTORY_SEPARATOR);
}

if ( ! defined("ROOT")) {
	define("ROOT", $_SERVER["DOCUMENT_ROOT"]);
}

if ( ! defined("ASSETS_DIR")) {
	define("ASSETS_DIR", ROOT . DS . 'assets');
}

if ( ! defined("ASSETS_PATH")) {
	define("ASSETS_PATH", 'http://' . $_SERVER["HTTP_HOST"] . DS . 'assets');
}

if ( ! defined("LIB")) {
	define("LIB", ROOT . DS . 'lib');
}