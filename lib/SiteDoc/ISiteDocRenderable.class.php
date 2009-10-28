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
interface ISiteDocRenderable
{
	/**
	 * @return string
	 */
	function toHtml(SiteDocContentBlockRenderer $renderer);
}

?>