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
final class BlogEntryEntityPhysicalSchema implements IPhysicallySchematic
{
	/**
	 * @see IPhysicallySchematic::getDBTableName()
	 * @return string
	 */
	function getDBTableName()
	{
		return 'blog_entry';
	}

	/**
	 * @see IPhysicallySchematic::getDBFields()
	 * @return array
	 */
	function getDBFields()
	{
		return array('id', 'title', 'text', 'pub_time', 'pub_date', 'rest_id');
	}
}

?>