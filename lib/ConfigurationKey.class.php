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
final class ConfigurationKey extends Enumeration implements ICompositeIdentifier, IBoxable
{
	const ADMIN_EMAIL = 'ae';
	const ADMIN_PASSWORD = 'ap';

	static function cast($value)
	{
		return new self ($value);
	}
}

?>