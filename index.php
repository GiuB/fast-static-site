<?php

/**
 * Main File
 */

// "Controller"
require_once('inc/_top.php');

$file_name = basename(__FILE__);
$view = basename(__FILE__, '.php') . '.html';

// Template
$context = array(
	'STATIC_URL' => STATIC_DEV_URL,
	'DEV_MODE' => true
);
$tpl = $twig->render($view, $context);

// Output view
echo $tpl;

// Store production html file
$prod_context = array(
	'STATIC_URL' => STATIC_PRODUCTION_URL,
	'DEV_MODE' => false
);
FSUtil::fileToHtml($file_name, array_merge($context, $prod_context));