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
 * @ingroup Phoebius_SiteDoc_Domain
 */
class Release
{
	/**
	 * @var string
	 */
	private $version;

	/**
	 * @var DOMNode
	 */
	private $about;

	/**
	 * @var Date
	 */
	private $date;

	/**
	 * @var string
	 */
	private $page;

	/**
	 * @return Release
	 */
	function setPage($page)
	{
		Assert::isScalar($page);

		$this->page = $page;

		return $this;
	}

	/**
	 * @return Release
	 */
	function setVersion($version)
	{
		Assert::isScalar($version);

		$this->version = $version;

		return $this;
	}

	/**
	 * @return Release
	 */
	function setDate(Date $date)
	{
		$this->date = $date;

		return $this;
	}

	/**
	 * @return Release
	 */
	function setAbout(DOMNode $about)
	{
		$this->about = $about;

		return $this;
	}

	/**
	 * @return string
	 */
	function getVersion()
	{
		return $this->version;
	}

	/**
	 * @return string
	 */
	function getPage()
	{
		return $this->page;
	}

	/**
	 * @return Date
	 */
	function getDate()
	{
		return $this->date;
	}

	/**
	 * @return DOMNode
	 */
	function getAbout()
	{
		return $this->about;
	}
}

?>