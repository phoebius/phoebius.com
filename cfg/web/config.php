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