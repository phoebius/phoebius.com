<?php
/* ***********************************************************************************************
 *
 * Phoebius Framework v.1.0.1
 *
 * **********************************************************************************************
 *
 * This is an auxiliary autogenerated file. Do not edit it as it can be regenerated implicitly!
 *
 ************************************************************************************************/

/**
 * Autogenerated class
 */
abstract class AutoConfigurationEntry extends IdentifiableOrmEntity implements IOrmRelated, IDaoRelated
{
	/**
	 * @var ConfigurationKey|null
	 */
	protected $id;

	/**
	 * @var scalar
	 */
	protected $value;

	/**
	 * @return ConfigurationEntryEntity
	 */
	static function orm()
	{
		return ConfigurationEntryEntity::getInstance();
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
	 * @param ConfigurationKey $id
	 * @return ConfigurationEntry itself
	 */
	function setId(ConfigurationKey $id = null)
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
	 * @return ConfigurationKey|null
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
	 * @param scalar $value
	 * @return ConfigurationEntry itself
	 */
	function setValue($value)
	{
		$this->value = $value;

		return $this;
	}

	/**
	 * @return mixed
	 */
	function getValue()
	{
		return $this->value;
	}
}

?>