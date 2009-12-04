<?php
/* ***********************************************************************************************
 *
 * Phoebius Framework v.1.0.0
 *
 * **********************************************************************************************
 *
 * This is an auxiliary autogenerated file. Do not edit it as it can be regenerated implicitly!
 *
 ************************************************************************************************/

/**
 * Autogenerated class
 */
final class BlogEntryBlogTagEntityLogicalSchema implements ILogicallySchematic
{
	private $propertyNames = array('BlogEntry', 'BlogEntryTag');

	/**
	 * Returns the name of the class representing an entity
	 * @return string
	 */
	function getEntityName()
	{
		return 'BlogEntryBlogTag';
	}

	/**
	 * @return OrmEntity
	 */
	function getNewEntity()
	{
		return new BlogEntryBlogTag;
	}

	/**
	 * @return OrmProperty|null
	 */
	function getIdentifier()
	{
		return null;
	}

	/**
	 * Gets the set of {@link OrmProperty}
	 * @return array
	 */
	function getProperties()
	{
		return array(
			'BlogEntry' => new OrmProperty('BlogEntry', array('blog_entry'), new AssociationPropertyType(BlogEntry::orm(), new AssociationMultiplicity(AssociationMultiplicity::EXACTLY_ONE), new AssociationBreakAction(AssociationBreakAction::CASCADE)), new OrmPropertyVisibility(OrmPropertyVisibility::FULL), new AssociationMultiplicity(AssociationMultiplicity::EXACTLY_ONE), false, false),
			'BlogEntryTag' => new OrmProperty('BlogEntryTag', array('blog_entry_tag'), new AssociationPropertyType(BlogEntryTag::orm(), new AssociationMultiplicity(AssociationMultiplicity::EXACTLY_ONE), new AssociationBreakAction(AssociationBreakAction::CASCADE)), new OrmPropertyVisibility(OrmPropertyVisibility::FULL), new AssociationMultiplicity(AssociationMultiplicity::EXACTLY_ONE), false, false)
		);
	}

	/**
	 * @return OrmProperty
	 */
	function getProperty($name)
	{
		if (!in_array($name, $this->propertyNames)) {
			throw new ArgumentException('name', $name);
		}

		$properties = $this->getProperties();

		return $properties[$name];
	}
}

?>