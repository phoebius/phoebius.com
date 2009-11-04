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
 * @ingroup Phoebius_SiteDoc_Domain
 */
class SiteDocAuthor
{
	private $title;
	private $name;

	function __construct($title, $name)
	{
		Assert::isScalar($title);
		Assert::isScalar($name);

		$this->title = $title;
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	function getTitle()
	{
		return $this->title;
	}

	/**
	 * @return string
	 */
	function getName()
	{
		return $this->name;
	}
}

?>