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
final class ConfigurationEntryEntityPhysicalSchema implements IPhysicallySchematic
{
	/**
	 * @see IPhysicallySchematic::getTable()
	 * @return string
	 */
	function getTable()
	{
		return 'configuration_entry';
	}

	function getFields()
	{
		return array('id', 'value');
	}
}

?>