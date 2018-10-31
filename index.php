<?php

spl_autoload_register(function ($class) {
	$dirs = glob(__DIR__ . '/src/*' , GLOB_ONLYDIR);
	$dirs[] = 'src';

	foreach ($dirs as $dir) {
		$file = $dir . DIRECTORY_SEPARATOR . $class . '.' . 'php';

		if(file_exists($file)) {
			/** @noinspection PhpIncludeInspection */
			include_once $file;
			return true;
		}
	}

	return false;
});

new Notifier();
