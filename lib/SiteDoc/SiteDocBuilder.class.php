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