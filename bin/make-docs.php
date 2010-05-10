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

require ( APP_ROOT . '/externals/phoebius/etc/app.init.php' );
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
Usage: {$argv[0]} doc-src/

where doc-src/ is a directory with XML documentation,
which containts at least xml/site/index.xml

EOT;
}

if (!isset($argv[1]))
	stop();

$docPath = realpath($argv[1]);
if (!is_dir($argv[1]))
	stop('Incorrect path to the documentation directory');

if (!is_file($docPath . '/xml/site/index.xml')) 
	stop('Incorrect path to the documentation directory (xml/site/index.xml not found at ' . $docPath . ')');

$siteIndex =
	XmlSiteDocIndexBuilder::create($docPath . '/xml/site/index.xml')
		->build();

$siteIndex->build(PHOEBIUS_SITE_HTDOCS_PATH);


message('Done');

?>