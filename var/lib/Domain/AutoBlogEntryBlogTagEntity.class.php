<?php
/* ***********************************************************************************************
 *
 * Phoebius Framework Generator
 *
 * **********************************************************************************************
 *
 * This is file is autogenerated
 *
 ************************************************************************************************/

/**
 *
 */
abstract class AutoBlogEntryBlogTagEntity extends LazySingleton implements IQueryable
{
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
		return new BlogEntryBlogTagEntityLogicalSchema;
	}

	/**
	 * @return IOrmEntityAccessor
	 */
	function getDao()
	{
		return new RdbmsDao(
			DBPool::getDefault(),
			$this
		);
	}

	/**
	 * @return IPhysicallySchematic
	 */
	function getPhysicalSchema()
	{
		return new BlogEntryBlogTagEntityPhysicalSchema;
	}
}

?>