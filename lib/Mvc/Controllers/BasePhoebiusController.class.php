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
	function handle(IControllerContext $context)
	{
		$this->checkCredentials($context);

		parent::handle($context);
	}

	protected function checkCredentials(IControllerContext $context)
	{
		if (!$this->clientToken) {
			$this->clientToken = new ClientToken(
				$context->getAppContext()->getServer()->getClientHash(true)
			);

			try {
				$authkey = $context->getAppContext()->getRequest()->getAnyVariable(self::ADMIN_AUTHORIZED_COOKIE_NAME);

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

		$this->getModel()->addCollection(
			array(
				'isAdmin' => $this->isAdminAuthorized,
			)
		);
	}

	protected function setAdminNotAuthorized()
	{
		$this->isAdminAuthorized = false;

		$this->getModel()->addCollection(
			array(
				'isAdmin' => $this->isAdminAuthorized,
			)
		);
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