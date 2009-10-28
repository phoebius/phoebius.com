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
 * @ingroup SiteDoc
 */
class SiteDocIndexRefItem extends SiteDocIndexItem
{
	private $name;

	function __construct(
			$name, $link, SiteDocIndexItem $parent = null
		)
	{
		Assert::isScalar($name);

		$this->name = $name;

		parent::__construct($link, $parent);
	}

	function getName()
	{
		return $this->name;
	}
}

?>