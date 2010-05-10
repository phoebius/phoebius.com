<?php
/* ***********************************************************************************************
 *
 * Phoebius Framework
 *
 * **********************************************************************************************
 *
 * Copyright (c) 2009 Scand Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under the terms
 * of the GNU Lesser General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * You should have received a copy of the GNU Lesser General Public License along with
 * this program; if not, see <http://www.gnu.org/licenses/>.
 *
 ************************************************************************************************/

define('APP_ROOT', join(
		DIRECTORY_SEPARATOR,
		array_slice(
			explode(DIRECTORY_SEPARATOR, dirname(__FILE__)), 0, -1
		)
	)
);

require ( APP_ROOT . '/phoebius-src/etc/app.init.php' );
require ( APP_ROOT . '/etc/config.php' );

//////////////////////////////////////////////////////////////////////////////////////////////////

require
	APP_ROOT . DIRECTORY_SEPARATOR .
	'cfg' . DIRECTORY_SEPARATOR .
	APP_SLOT . DIRECTORY_SEPARATOR .
	'config.php';

function message($m)
{
	echo $m, PHP_EOL;
}

function stop($m = null)
{
	if ($m) {
		message($m);
		echo PHP_EOL;
	}

	help();
	
	exit (1);
}

function help()
{
	global $argv;

	echo <<<EOT
Usage: {$argv[0]} document.xml

The HTML-rendered result is directed to stdout.

EOT;
}

if (!isset($argv[1]))
	stop();

$docPath = realpath($argv[1]);
if (!is_file($argv[1]))
	stop('Incorrect path to an XML document');

$siteDocBuilder = new XmlSiteDocBuilder($docPath);
$siteDoc = $siteDocBuilder->build();
$renderer = new SiteDocContentBlockRenderer();
foreach ($siteDoc->getChapters() as $chapter) {
	echo $chapter->toHtml($renderer);
}

?>