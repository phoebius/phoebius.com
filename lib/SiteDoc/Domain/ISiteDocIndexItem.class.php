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
interface ISiteDocIndexItem
{
	/**
	 * @return string
	 */
	function getName();

	/**
	 * @return string
	 */
	function getLink();

	/**
	 * @return ISiteDocIndexItem|null
	 */
	function getParent();

	/**
	 * @return array of ISiteDocIndexItem
	 */
	function getChildren();
}

?>