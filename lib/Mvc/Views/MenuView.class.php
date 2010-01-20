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

class MenuView extends UIPhpLayoutPresentation
{
	const ITEM_DOWNLOAD = 'Download';
	const ITEM_SUPPORT = 'Support';
	const ITEM_BLOG = 'Blog';
	const ITEM_ABOUT = 'About';

	private $activeElement;

	function __construct($activeElement = null)
	{
		Assert::isScalarOrNull($activeElement);

		$this->activeElement = $activeElement;

		parent::__construct('parts/top-menu');
	}

	function getActiveElement()
	{
		return $this->activeElement;
	}
}

?>