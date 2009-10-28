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
 * @ingroup SiteDoc
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