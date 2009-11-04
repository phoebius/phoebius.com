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
 *
 * @ingroup Phoebius_SiteDoc_Domain
 */
class SiteDocVersion
{
	private $operator;
	private $number;

	function __construct(
			BinaryLogicalOperator $operator,
			$number
		)
	{
		Assert::isScalar($number);

		$this->operator = $operator;
		$this->number = $number;
	}
}

?>