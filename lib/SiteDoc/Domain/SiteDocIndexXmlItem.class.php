<?php
/* ***********************************************************************************************
 *
 * Phoebius Framework
 *
 * **********************************************************************************************
 *
 * Copyright (c) 2009 phoebius.org
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
 * @ingroup SiteDoc
 */
class SiteDocIndexXmlItem extends SiteDocIndexItem
{
	private $xmlDocPath;

	function __construct(
			$xmlDocPath, $link, SiteDocIndexItem $parent = null
		)
	{
		Assert::isScalar($xmlDocPath);

		if (!file_exists($xmlDocPath)) {
			throw new ArgumentException('xmlDocPath', 'xml doc not found');
		}

		$this->xmlDocPath = $xmlDocPath;

		parent::__construct($link, $parent);
	}

	function getName()
	{
		Assert::notImplemented();
	}

	function getDoc()
	{
		Assert::notImplemented();
	}

}

?>