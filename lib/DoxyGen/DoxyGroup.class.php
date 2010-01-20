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
 * @ingorup Phoebius_DoxyGen
 */
class DoxyGroup
{
	private $id;
	private $name;
	private $about;
	private $version;
	private $gid;

	/**
	 * @var DoxyGroup
	 */
	private $parent;

	/**
	 * @var array of Namespace
	 */
	private $inner = array();

	function __construct($id, DoxyGroup $parent = null, $gid = null)
	{
		Assert::isScalar($id);
		Assert::isScalarOrNull($gid);

		$this->id = $id;
		$this->parent = $parent;

		$this->gid =
			$gid
				? $gid
				: $this->generateGid();

		if ($this->parent) {
			$this->parent->addInner($this);
		}
	}

	/**
	 * @return DoxyGroup
	 */
	function setName($name = null)
	{
		Assert::isScalarOrNull($name);

		$this->name = $name;

		return $this;
	}

	/**
	 * @return DoxyGroup
	 */
	function setAbout($about = null)
	{
		Assert::isScalarOrNull($about);

		$this->about = $about;

		return $this;
	}

	/**
	 * @return string|null
	 */
	function getAbout()
	{
		return $this->about;
	}

	/**
	 * @return DoxyGroup
	 */
	function setVersion($version = null)
	{
		Assert::isScalarOrNull($version);

		$this->version = $version;

		return $this;
	}

	/**
	 * @return string
	 */
	function getGid()
	{
		return $this->gid;
	}

	/**
	 * @return string
	 */
	function getName()
	{
		return $this->name;
	}

	/**
	 * @return string
	 */
	function getId()
	{
		return $this->id;
	}

	/**
	 * @return array of DoxyGroup
	 */
	function getInner()
	{
		return $this->inner;
	}

	/**
	 * @return DoxyGroup|null
	 */
	function getParent()
	{
		return $this->parent;
	}

	/**
	 * @return Namespace itself
	 */
	function addInner(DoxyGroup $doxyGroup)
	{
		if (
			isset($this->inner[$doxyGroup->id])
			&& $this->inner[$doxyGroup->id] !== $doxyGroup
		) {
			throw new ArgumentException(
				'namespace',
				sprintf(
					'%s already defined inside %s',
					$doxyGroup->id,
					$this->id
				)
			);
		}

		$this->inner[$doxyGroup->id] = $doxyGroup;

		return $this;
	}

	private function generateGid()
	{
		if ($this->parent && ($parentGid = $this->parent->getGid())) {
			$gid = $parentGid . '_' . $this->id;
		}
		else {
			$gid = $this->id;
		}

		return $gid;
	}
}

?>