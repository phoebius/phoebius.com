<?php
/* ***********************************************************************************************
 *
 * Phoebius Framework
 *
 * **********************************************************************************************
 *
 * Copyright notice
 *
 ************************************************************************************************/

//
// host config
//

define ('APP_SLOT_CONFIGURATION', SLOT_PRESET_PRODUCTION);

DBPool::add(
	'default',
	PgSqlDB::create()
		->setDBName('phoebius-site')
		->setEncoding('utf8')
		->setUser('phoebius')
		// do not set host=localhost to avoid using TCP/IP
		// pwd is empty as we use 'ident sameuser' authentication
);

?>