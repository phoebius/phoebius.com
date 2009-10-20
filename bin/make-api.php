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

	$rootDoxyGroup =
		XmlDoxyGroupBuilder::create(PHOEBIUS_SITE_DOCS_SRC_PATH . '/xml/other/groups.xml')
			->build();

	$header = new TempFile;
	DoxyHeaderBuilder::create($rootDoxyGroup)
		->build($header);

	$doxyGen = new DoxyGen(
		PHOEBIUS_SITE_DOXYGEN_PARTS_PATH . '/doxygen.conf'
	);

	$doxyGen->addInputPath($header->getPath());
	$doxyGen->addInputPath(PHOEBIUS_SITE_FRAMEWORK_SRC_PATH . '/lib');

	FSUtils::cleanDirectory(PHOEBIUS_SITE_API_PATH);

	$doxyGen->make(PHOEBIUS_SITE_API_PATH);

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