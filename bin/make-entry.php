<?php
/* ***********************************************************************************************
 *
 * Phoebius Framework
 *
 * **********************************************************************************************
 *
 * Copyright (c) 2009 phoebius.org
 *
 * All rights reserved.
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

try
{
	require
		APP_ROOT . DIRECTORY_SEPARATOR .
		'cfg' . DIRECTORY_SEPARATOR .
		APP_SLOT . DIRECTORY_SEPARATOR .
		'config.php';

	if (!isset($argv[1]))
		die ('usage: php make-entry.php /path-to-xml-doc.xml');

	$docPath = realpath($argv[1]);
	if (!is_file($argv[1]))
		die ('usage: php make-entry.php /path-to-xml-doc.xml');

	$siteDocBuilder = new XmlSiteDocBuilder($docPath);
	$siteDoc = $siteDocBuilder->build();
	$renderer = new SiteDocContentBlockRenderer();
	foreach ($siteDoc->getChapters() as $chapter) {
		echo $chapter->toHtml($renderer);
	}
}
catch (ExecutionContextException $e)
{
	echo '<pre>', $e->getTraceAsString();
	throw $e;
}
catch (CompilationContextException $e)
{
	// this could happen at development and test hostConfigurations only
	// and never in production system
	echo '<pre>', $e->getTraceAsString();
	throw $e;
}

?>