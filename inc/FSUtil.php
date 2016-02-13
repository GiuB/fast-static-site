<?php

/**
 * Write here project utilities
 */

use zz\Html\HTMLMinify;

class FSUtil {

	/**
	 * Wrapper to create HTML file from a tpl
	 * This is a simple wrapper
	 *
	 * @param  {str} $filename 	Filename with extension
	 * @param  {array} $context Context render variables
	 */
	public static function fileToHtml($filename, $context) {
		global $twig;

		// get rendered tpl
		$file = basename($filename, ".php") . ".html";
		$tpl = $twig->render($file, $context);

		// Minify tpl html
		if (!$context['DEV_MODE'])
			$tpl = self::_minifyHtml($tpl);

		// Write tpl to html file
		self::_writeTplToHtml($tpl, $filename);
	}

	/**
	 * Create filename.html
	 * This file is used only for production so prefixed static URL is properly set
	 *
	 * @param  {str} $tpl     	Html string
	 * @param  {str} $filename 	Filename with extension
	 */
	private static function _writeTplToHtml($tpl, $filename) {

		if (empty($tpl))
			throw new Exception('Parameter [$tpl] is empty');

		if (empty($filename))
			throw new Exception('Parameter [$filename] is empty');

		// Calc filename
		$file = basename($filename, ".php") . ".html";

		// Write filename to local disk
		$fp = fopen(ROOT . '/' . $file, "w") or die("Unable to open " . $file);
		fwrite($fp, $tpl);
		fclose($fp);
	}

	/**
	 * Minify an HTML string
	 * @param  {str} $html
	 * @return {str} minify $html
	 */
	private static function _minifyHtml($html) {

		if (empty($html))
			throw new Exception('Parameter [$html] is empty');

		$options = array(
			'optimizationLevel' => 1
		);

		return HTMLMinify::minify($html, $options);
	}
}