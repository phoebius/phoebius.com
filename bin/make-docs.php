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

try
{
	require
		APP_ROOT . DIRECTORY_SEPARATOR .
		'cfg' . DIRECTORY_SEPARATOR .
		APP_SLOT . DIRECTORY_SEPARATOR .
		'config.php';

	$siteIndex =
		XmlSiteDocIndexBuilder::create(PHOEBIUS_SITE_DOCS_SRC_PATH . '/xml/site/index.xml')
			->build();

	$siteIndex->build(PHOEBIUS_SITE_HTDOCS_PATH);


	echo 'Done';
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