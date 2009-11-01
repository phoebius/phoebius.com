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