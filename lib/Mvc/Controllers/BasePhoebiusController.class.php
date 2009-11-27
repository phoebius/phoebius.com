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