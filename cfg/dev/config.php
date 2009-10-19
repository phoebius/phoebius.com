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

//
// host config
//

define ('APP_SLOT_CONFIGURATION', SLOT_PRESET_DEVELOPMENT);

Autoloader::getInstance()->clearCache();

DBPool::add(
	'default',
	PgSqlDB::create()
		->setDBName('phoebius-site')
		->setEncoding('utf8')
		->setUser('phoebius')
		->setPassword('phoebius')
);

?>