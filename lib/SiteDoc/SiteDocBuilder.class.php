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
abstract class SiteDocBuilder
{
	/**
	 * @var SiteDoc
	 */
	private $siteDoc;

	/**
	 * @return DoxyGroup
	 */
	abstract function build();

	function __construct(SiteDoc $siteDoc = null)
	{
		$this->siteDoc =
			$siteDoc
				? $siteDoc
				: new SiteDoc('');
	}

	/**
	 * @return SiteDoc
	 */
	function getSiteDoc()
	{
		return $this->siteDoc;
	}
}

?>