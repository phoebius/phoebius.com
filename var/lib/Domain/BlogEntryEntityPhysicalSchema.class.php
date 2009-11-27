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
	 * @see IPhysicallySchematic::getTable()
	 * @return string
	 */
	function getTable()
	{
		return 'blog_entry';
	}

	function getFields()
	{
		return array('id', 'title', 'text', 'pub_time', 'pub_date', 'rest_id');
	}
}

?>