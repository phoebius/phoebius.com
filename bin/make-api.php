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

if (!isset($argv[1]))
	die ('usage: php make-api.php phoebius-src/');

$frameworkPath = realpath($argv[1]);
if (!is_directory($argv[1]))
	die ('usage: php make-api.php phoebius-src/');

$rootDoxyGroup =
	XmlDoxyGroupBuilder::create($frameworkPath . '/doc/ns/groups.xml')
		->build();

$header = new TempFile;
DoxyHeaderWriter::create($rootDoxyGroup)
	->write($header);

$doxyGen = new DoxyGen(
	PHOEBIUS_SITE_DOXYGEN_PARTS_PATH . '/doxygen.conf'
);

$htmlHeader = new TempFile();

$presentation = new UIViewPresentation('doxy/header');
$presentation->setModel(
	new Model(array(
		'activeMenuItem' =>'Support',
		'breadScrumbs' => array(
			new ViewLink('Support', '/support/'),
			new ViewLink('API', '/support/api/'),
		),
	'forDoxy' => true
	))
);
$presentation->setRouteTable(new PhoebiusRouter);

$page = new UIPage($presentation);
$page->render($htmlHeader);

$doxyGen->setHtmlHeader($htmlHeader->getPath());


$presentation = new UIViewPresentation('parts/footer');
$presentation->setRouteTable(new PhoebiusRouter);

$page = new UIPage($presentation);
$htmlFooter = new TempFile();
$page->render($htmlFooter);

$doxyGen->setHtmlFooter($htmlFooter->getPath());

$doxyGen->addInputPath(
	PHOEBIUS_SITE_DOXYGEN_PARTS_PATH . '/mainpage.php'
);
$doxyGen->addInputPath($header->getPath());
$doxyGen->addInputPath($frameworkPath . '/lib');
//	$doxyGen->setOptions(array(
//		'PROJECT_NUMBER' => PHOEBIUS_VERSION
//	));

//	FSUtils::cleanDirectory(PHOEBIUS_SITE_API_PATH);
$doxyGen->make(PHOEBIUS_SITE_API_PATH);

echo 'Done';

?>