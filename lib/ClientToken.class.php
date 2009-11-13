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
 * Client is a User who accesses the service
 */
final class ClientToken
{
	/**
	 * @var ICipherer
	 */
	private $cipherer;

	/**
	 * @var array of {@link Client}
	 */
	private $authkeyCache = array();

	function __construct($privateKey)
	{
		$this->cipherer = new XorCipherer(
			$privateKey
		);
	}

	/**
	 * @return string
	 */
	function getAuthkey($data)
	{
		return $this->cipherer->encrypt(
			serialize($data)
		);
	}

	/**
	 * @throws StateException
	 * @return mixed
	 */
	function getData($authkey)
	{
		if (!isset($this->authkeyCache[$authkey])) {
			$serial = $this->cipherer->decrypt($authkey);

			try {
				$this->authkeyCache[$authkey] = unserialize($serial);
			}
			catch (ErrorException $e) {
				throw new StateException('invalid authkey');
			}
		}

		return $this->authkeyCache[$authkey];
	}
}

?>