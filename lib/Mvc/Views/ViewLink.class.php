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
 * @ingroup Phoebius_Mvc_Views
 */
class ViewLink
{
	private $name;
	private $address;

	function __construct($name, $address)
	{
		Assert::isScalar($name);
		Assert::isScalar($address);

		$this->name = $name;
		$this->address = $address;
	}

	function getName()
	{
		return $this->name;
	}

	function getAddress()
	{
		return $this->address;
	}

	function toHtml()
	{
		return
			'<a href="'
			. $this->address
			. '">'
			. $this->name
			. '</a>';
	}
}

?>