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
class SiteDoc
{
	/**
	 * @var string
	 */
	private $title;

	/**
	 * @var boolean
	 */
	private $generateContents;

	/**
	 * @var array of SiteDocChapter
	 */
	private $chapters = array();

	/**
	 * @var array of SiteDocAuthor
	 */
	private $authors = array();

	/**
	 * @var SiteDocVersion
	 */
	private $version;

	/**
	 * @return SiteDoc
	 */
	function setTitle($title)
	{
		Assert::isScalar($title);

		$this->title = $title;

		return $this;
	}

	/**
	 * @return string
	 */
	function getTitle()
	{
		return $this->title;
	}

	/**
	 * @return SiteDoc
	 */
	function addChapter(SiteDocChapter $chapter)
	{
		$this->chapters[] = $chapter;

		return $this;
	}

	/**
	 * @return array of SiteDocChapter
	 */
	function getChapters()
	{
		return $this->chapters;
	}

	/**
	 * @return SiteDoc
	 */
	function addAuthor(SiteDocAuthor $author)
	{
		$this->authors[] = $author;

		return $this;
	}

	/**
	 * @return array of SiteDocAuthor
	 */
	function getAuthors()
	{
		return $this->authors;
	}

	/**
	 * @return SiteDoc
	 */
	function setVersion(SiteDocVersion $version)
	{
		$this->version = $version;

		return $this;
	}

	function hasNamedChapters()
	{
		$count = 0;
		foreach ($this->chapters as $chapter) {
			if ($chapter->getTitle()) {
				$count++;
			}

			if ($count > 1) {
				return true;
			}
		}

		return false;
	}
}

?>