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
 * @ingroup Phoebius
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