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