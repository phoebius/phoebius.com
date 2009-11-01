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
 * @ingroup Phoebius_Domain
 */
final class ConfigurationKey extends Enumeration implements IIdentifierMappable
{
	const ADMIN_EMAIL = 'ae';
	const ADMIN_PASSWORD = 'ap';

	/**
	 * @param scalar $value
	 * @return ConfigurationKey
	 * @throws TypeCastException
	 */
	static function cast($value)
	{
		return new self ($value);
	}

	function toScalarId()
	{
		return $this->getValue();
	}
}

?>