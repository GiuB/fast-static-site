<?php

/**
 * Application Top
 */

require_once('conf.php');
require_once('requires.php');

global $twig;

// Load twing (template engine system)
$loader = new Twig_Loader_Filesystem(TPL);
$twig = new Twig_Environment($loader);