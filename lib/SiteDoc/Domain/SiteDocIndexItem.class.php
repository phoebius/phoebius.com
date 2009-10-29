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
abstract class SiteDocIndexItem implements ISiteDocIndexItem
{
	/**
	 * @var SiteDocIndexItem
	 */
	private $parent;

	/**
	 * @var string|null
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

	function __construct($link, SiteDocIndexItem $parent = null, $menuId = null)
	{
		Assert::isScalar($link);

		$this->parent = $parent;

		if ($this->parent) {
			$this->parent->addChild($this);
		}

		$this->link = $link;
		$this->setMenuId(
			!$menuId && $parent
				? $parent->getMenuId()
				: $menuId
		);
	}

	function setMenuId($menuId = null)
	{
		Assert::isScalarOrNull($menuId);

		$this->menuId = $menuId;

		return $this;
	}

	function getMenuId()
	{
		return $this->menuId;
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