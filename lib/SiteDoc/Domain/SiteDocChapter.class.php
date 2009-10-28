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
class SiteDocChapter
{
	/**
	 * @var string|null
	 */
	private $title;

	/**
	 * @var array of SiteDocParagraph|SiteDocChapter
	 */
	private $items = array();

	function __construct($title = null)
	{
		Assert::isScalarOrNull($title);

		$this->title = $title;
	}

	/**
	 * @return string|null
	 */
	function getTitle()
	{
		return $this->title;
	}

	/**
	 * @return SiteDocChapter
	 */
	function addParagraph(SiteDocParagraph $paragraph)
	{
		$this->items[] = $paragraph;

		return $this;
	}

	/**
	 * @return SiteDocChapter
	 */
	function addSubChapter(SiteDocChapter $subChapter)
	{
		$this->items[] = $subChapter;

		return $this;
	}

	/**
	 * @return string
	 */
	function toHtml(SiteDocContentBlockRenderer $renderer)
	{
		$yield = StringUtils::EMPTY_STRING;

		if ($this->title) {
			$yield .= $renderer->getTitle($this->title);
		}

		foreach ($this->items as $item) {
			$yield .=
				$item->toHtml(
					$item instanceof self
						? $renderer->spawnNested()
						: $renderer
					);
		}

		return $yield;
	}
}

?>