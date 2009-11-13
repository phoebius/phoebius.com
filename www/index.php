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

	//
	// your stuff goes here
	//

	$request = new WebRequest(
		new WebRequestDictionary($_SERVER),
		$_GET, $_POST, $_COOKIE, $_FILES
	);

	$webContext = new WebContext(
		$request,
		new WebResponse(true, $request),
		new WebServerState(new WebServerStateDictionary($_SERVER))
	);

	$router = new PhoebiusRouter();

	$trace = $router->getTrace($webContext);
	
	$trace->handle();
}
catch (Exception $e)
{
	if (APP_SLOT_CONFIGURATION & SLOT_CONFIGURATION_FLAG_DEVELOPMENT) {
		//echo '<pre>', $e->getTraceAsString();
		throw $e;
	}
	else {
		mail(
			ConfigurationEntry::getEntry(
				new ConfigurationKey(ConfigurationKey::ADMIN_EMAIL)
			)->getValue(),
			"[Phoebius crash] phoebius.org crash #" . substr(sha1($e->getMessage()), 0, 6),
			join(
				"\n\n",
				array(
					$_SERVER['REQUEST_URI'],
					'Request method: ' . $_SERVER['REQUEST_METHOD'],
					get_class($e). ' msg: ' . $e->getMessage(),
					print_r((array)$e, true),
					$e->getTraceAsString()
				)
			)
		);
	}

	$router->getFallbackTrace()->handle($trace);
}

?>