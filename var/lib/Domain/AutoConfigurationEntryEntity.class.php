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
abstract class AutoConfigurationEntryEntity extends LazySingleton implements IQueryable
{
	/**
	 * @var IOrmEntityAccessor
	 */
	private $dao;

	/**
	 * @return IOrmEntityMapper
	 */
	function getMap()
	{
		return new OrmMap($this->getLogicalSchema());
	}

	/**
	 * @return ILogicallySchematic
	 */
	function getLogicalSchema()
	{
		return new ConfigurationEntryEntityLogicalSchema;
	}

	/**
	 * @return IOrmEntityAccessor
	 */
	function getDao()
	{
		if (!$this->dao) {
			$this->dao = new RdbmsDao(
				DBPool::getDefault(),
				$this
			);
		}

		return $this->dao;
	}

	/**
	 * @return IPhysicallySchematic
	 */
	function getPhysicalSchema()
	{
		return new ConfigurationEntryEntityPhysicalSchema;
	}
}

?>