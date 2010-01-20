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