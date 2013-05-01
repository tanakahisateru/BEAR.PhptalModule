<?php

error_reporting(E_ALL);

// loader
$loader = require dirname(__DIR__) . '/vendor/autoload.php';
/** @var $loader \Composer\Autoload\ClassLoader */
$loader->add('BEAR\PhptalModule', [__DIR__]);

$GLOBALS['_BEAR_TEST_DIR'] = __DIR__;
$GLOBALS['_BEAR_PACKAGE_DIR'] = dirname(__DIR__);

ini_set('error_log', sys_get_temp_dir() . '/error.log');
