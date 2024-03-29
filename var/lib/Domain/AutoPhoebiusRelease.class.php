<?php
/* ***********************************************************************************************
 *
 * Phoebius Framework v.1.2.0 Copyright (c) 2010 Scand Ltd.
 *
 * **********************************************************************************************
 *
 * Generated at 2010/05/09 17:23
 *
 * This is an auxiliary autogenerated file. Do not edit it as it can be regenerated implicitly!
 *
 ************************************************************************************************/

/**
 * Autogenerated class
 */
abstract class AutoPhoebiusRelease extends IdentifiableOrmEntity implements IOrmRelated, IDaoRelated
{
	/**
	 * @var scalar|null
	 */
	protected $id;

	/**
	 * @var Date
	 */
	protected $date;

	/**
	 * @var scalar
	 */
	protected $version;

	/**
	 * @var scalar
	 */
	protected $description;

	/**
	 * @var scalar
	 */
	protected $link;

	/**
	 * @return PhoebiusReleaseEntity
	 */
	static function orm()
	{
		return PhoebiusReleaseEntity::getInstance();
	}

	/**
	 * @return IOrmEntityMapper
	 */
	static function map()
	{
		return self::orm()->getMap();
	}

	/**
	 * @return IOrmEntityAccessor
	 */
	static function dao()
	{
		return self::orm()->getDao();
	}

	/**
	 * @return EntityQuery
	 */
	static function query()
	{
		return new EntityQuery(self::orm());
	}

	/**
	 * @param scalar $id
	 * @return PhoebiusRelease itself
	 */
	function setId($id = null)
	{
		$this->id = $id;

		return $this;
	}

	function _setId($id)
	{
		$this->setId($id);

		return $this;
	}

	/**
	 * @return mixed|null
	 */
	function getId()
	{
		return $this->id;
	}

	function _getId()
	{
		return $this->getId();
	}

	/**
	 * @param Date $date
	 * @return PhoebiusRelease itself
	 */
	function setDate(Date $date)
	{
		$this->date = $date;

		return $this;
	}

	/**
	 * @return Date
	 */
	function getDate()
	{
		return $this->date;
	}

	/**
	 * @param scalar $version
	 * @return PhoebiusRelease itself
	 */
	function setVersion($version)
	{
		$this->version = $version;

		return $this;
	}

	/**
	 * @return mixed
	 */
	function getVersion()
	{
		return $this->version;
	}

	/**
	 * @param scalar $description
	 * @return PhoebiusRelease itself
	 */
	function setDescription($description)
	{
		$this->description = $description;

		return $this;
	}

	/**
	 * @return mixed
	 */
	function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param scalar $link
	 * @return PhoebiusRelease itself
	 */
	function setLink($link)
	{
		$this->link = $link;

		return $this;
	}

	/**
	 * @return mixed
	 */
	function getLink()
	{
		return $this->link;
	}
}

?>