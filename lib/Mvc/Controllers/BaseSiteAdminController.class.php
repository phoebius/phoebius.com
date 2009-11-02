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