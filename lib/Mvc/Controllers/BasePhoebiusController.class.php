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
abstract class BasePhoebiusController extends ActionBasedController
{
	const ADMIN_AUTHORIZED_COOKIE_NAME = "phoebius-admin";

	/**
	 * @var ClientToken
	 */
	private $clientToken;

	/**
	 * @var boolean
	 */
	private $isAdminAuthorized = false;

	/**
	 * @throws RouteHandleException
	 * @return void
	 */
	function handle(Trace $trace)
	{
		$this->checkCredentials($trace);

		parent::handle($trace);
	}

	protected function checkCredentials(Trace $trace)
	{
		if (!$this->clientToken) {
			$this->clientToken = new ClientToken(
				$trace->getWebContext()->getServer()->getClientHash(true)
			);

			$request = $trace->getWebContext()->getRequest();

			try {
				$authkey = $request[self::ADMIN_AUTHORIZED_COOKIE_NAME];

				$this->clientToken->getData($authkey);

				$this->setAdminAuthorized();
			}
			catch (Exception $e){
				$this->setAdminNotAuthorized();
			}
		}
	}

	/**
	 * @return ClientToken
	 */
	protected function getClientToken()
	{
		return $this->clientToken;
	}

	/**
	 * @return void
	 */
	protected function setAdminAuthorized()
	{
		$this->isAdminAuthorized = true;

		$this->getModel()->set('isAdmin', $this->isAdminAuthorized);
	}

	protected function setAdminNotAuthorized()
	{
		$this->isAdminAuthorized = false;

		$this->getModel()->set('isAdmin', $this->isAdminAuthorized);
	}

	/**
	 * @return boolean
	 */
	protected function isAdminAuthorized()
	{
		return $this->isAdminAuthorized;
	}
}

?>