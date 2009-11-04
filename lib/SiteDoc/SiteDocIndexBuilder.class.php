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
 * @ingorup Phoebius_SiteDoc
 */
abstract class SiteDocIndexBuilder
{
	/**
	 * @var SiteDocIndexItem
	 */
	private $rootIndex;

	/**
	 * @return DoxyGroup
	 */
	abstract function build();

	function __construct(SiteDocIndexItem $rootIndex = null)
	{
		$this->rootIndex =
			$rootIndex
				? $rootIndex
				: new SiteDocIndexRootItem;
	}

	/**
	 * @return SiteDocIndexItem
	 */
	function getRootIndex()
	{
		return $this->rootIndex;
	}
}

?>