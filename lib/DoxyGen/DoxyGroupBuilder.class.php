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
 * @ingorup DoxyGen
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

	/**
	 * @return DoxyGroupBuilder
	 */
	static function create(DoxyGroup $rootDoxyGroup = null)
	{
		return new self ($rootDoxyGroup);
	}

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