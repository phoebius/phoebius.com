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
final class PhoebiusReleaseEntityPhysicalSchema implements IPhysicallySchematic
{
	/**
	 * @see IPhysicallySchematic::getTable()
	 * @return string
	 */
	function getTable()
	{
		return 'phoebius_release';
	}

	function getFields()
	{
		return array('id', 'date', 'version', 'description', 'link');
	}
}

?>