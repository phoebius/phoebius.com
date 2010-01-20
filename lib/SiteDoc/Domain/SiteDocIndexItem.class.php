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
abstract class SiteDocIndexItem implements ISiteDocIndexItem
{
	/**
	 * @var SiteDocIndexItem
	 */
	private $parent;

	/**
	 * @var SitePart|null
	 */
	private $menuId;

	/**
	 * @var array of SiteDocIndexItem
	 */
	private $children = array();

	/**
	 * @var string
	 */
	private $link;

	function __construct($link, SiteDocIndexItem $parent = null, SitePart $sitePart = null)
	{
		Assert::isScalar($link);

		$this->parent = $parent;

		if ($this->parent) {
			$this->parent->addChild($this);
		}

		$this->link = $link;
		$this->sitePart =
			!$sitePart && $parent
				? $parent->getSitePart()
				: $sitePart;
	}

	function setSitePart(SitePart $sitePart = null)
	{
		$this->sitePart = $sitePart;

		return $this;
	}

	/**
	 * @return SitePart
	 */
	function getSitePart()
	{
		return $this->sitePart;
	}

	/**
	 * @return string
	 */
	function getLink()
	{
		return $this->link;
	}

	/**
	 * @return ISiteDocIndexItem|null
	 */
	function getParent()
	{
		return $this->parent;
	}

	/**
	 * @return array of ISiteDocIndexItem
	 */
	function getChildren()
	{
		return $this->children;
	}

	/**
	 * @return boolean
	 */
	function hasChildren()
	{
		return !empty($this->children);
	}

	/**
	 * @return SiteDocIndexXmlItem
	 */
	function addChild(SiteDocIndexItem $child)
	{
		$this->children[spl_object_hash($child)] = $child;

		return $this;
	}

	/**
	 * @return SiteDocIndexXmlItem
	 */
	function addChildren(array $children)
	{
		foreach ($children as $child) {
			$this->addChild($child);
		}

		return $this;
	}
}

?>