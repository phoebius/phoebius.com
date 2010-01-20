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

/**
 * @ingroup Phoebius_Mvc_Controllers
 */
abstract class BaseSiteAdminController extends BasePhoebiusController
{
	/**
	 * @return void
	 */
	protected function authorizeAsAdmin($username)
	{
		setcookie(
			BasePhoebiusController::ADMIN_AUTHORIZED_COOKIE_NAME,
			$this->getClientToken()->getAuthkey(array($username)),
			time() + (3600 * 24 * 30 * 12),
			'/'
		);

		$this->setAdminAuthorized();
	}
}

?>