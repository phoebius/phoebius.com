<?php
/* ***********************************************************************************************
 *
 * Phoebius Framework
 *
 * **********************************************************************************************
 *
 * Copyright (c) 2009 phoebius.org
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
// application config
//

set_include_path(
	  APP_ROOT .DIRECTORY_SEPARATOR . 'lib' . PATH_SEPARATOR
	. APP_ROOT .DIRECTORY_SEPARATOR . 'var' . DIRECTORY_SEPARATOR . 'lib' . PATH_SEPARATOR
	. get_include_path()
);

define('PHOEBIUS_SITE_HTDOCS_PATH', APP_ROOT . DIRECTORY_SEPARATOR . 'www');

define('PHOEBIUS_SITE_FRAMEWORK_SRC_PATH', PHOEBIUS_BASE_ROOT);
define('PHOEBIUS_SITE_DOCS_SRC_PATH', APP_ROOT . DIRECTORY_SEPARATOR . 'doc-src');

define('PHOEBIUS_SITE_DOXYGEN_PARTS_PATH', APP_ROOT . DIRECTORY_SEPARATOR . 'doxygen');

define('PHOEBIUS_SITE_API_PATH', PHOEBIUS_SITE_HTDOCS_PATH . DIRECTORY_SEPARATOR . 'support' . DIRECTORY_SEPARATOR . 'api');

?>