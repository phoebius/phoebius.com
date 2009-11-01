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
abstract class AutoBlogEntryBlogTag extends OrmEntity implements IOrmRelated, IDaoRelated
{
	/**
	 * @var BlogEntry
	 */
	private $BlogEntry;

	/**
	 * @var BlogEntryTag
	 */
	private $BlogEntryTag;

	/**
	 * @return BlogEntryBlogTagEntity
	 */
	static function orm()
	{
		return BlogEntryBlogTagEntity::getInstance();
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
	 * @param BlogEntry BlogEntry
	 * @throws ArgumentException
	 * @return BlogEntryBlogTag an object itself
	 */
	function setBlogEntry(BlogEntry $BlogEntry)
	{
		$this->BlogEntry = $BlogEntry;

		return $this;
	}

	/**
	 * @return BlogEntry
	 */
	function getBlogEntry()
	{
		return $this->BlogEntry;
	}

	/**
	 * @param BlogEntryTag BlogEntryTag
	 * @throws ArgumentException
	 * @return BlogEntryBlogTag an object itself
	 */
	function setBlogEntryTag(BlogEntryTag $BlogEntryTag)
	{
		$this->BlogEntryTag = $BlogEntryTag;

		return $this;
	}

	/**
	 * @return BlogEntryTag
	 */
	function getBlogEntryTag()
	{
		return $this->BlogEntryTag;
	}
}

?>