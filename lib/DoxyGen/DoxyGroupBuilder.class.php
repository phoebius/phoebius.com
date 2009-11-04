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
 * @ingorup Phoebius_DoxyGen
 */
abstract class DoxyGroupBuilder
{
	/**
	 * @var DoxyGroup
	 */
	private $rootDoxyGroup;

	/**
	 * @return DoxyGroup
	 */
	abstract function build();

	function __construct(DoxyGroup $rootDoxyGroup = null)
	{
		$this->rootDoxyGroup =
			$rootDoxyGroup
				? $rootDoxyGroup
				: new DoxyGroup('');
	}

	function getRootDoxyGroup()
	{
		return $this->rootDoxyGroup;
	}
}

?>