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