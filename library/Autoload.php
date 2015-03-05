<?php
final class Autoload {
	public static function loadClass ($classname){
		require_once self::classPath($classname);
	}
	
	private static function classPath ($classname){
		$fileName = ltrim($classname, '\\');
		$file      = '';
		$namespace = '';
		if ($lastNsPos = strripos($fileName, '\\')) {
			$namespace = substr($fileName, 0, $lastNsPos);
			$fileName = substr($fileName, $lastNsPos + 1);
			$file      = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
		}
		$file .= str_replace('_', DIRECTORY_SEPARATOR, $fileName) . '.php';
		return $file;
	}
}
