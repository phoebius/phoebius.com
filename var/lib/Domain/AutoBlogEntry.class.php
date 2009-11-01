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
abstract class AutoBlogEntry extends IdentifiableOrmEntity implements IOrmRelated, IDaoRelated
{
	/**
	 * @var integer
	 */
	private $id;

	/**
	 * @var string
	 */
	private $title;

	/**
	 * @var string
	 */
	private $text;

	/**
	 * @var Timestamp
	 */
	private $pubTime;

	/**
	 * @var Date
	 */
	private $pubDate;

	/**
	 * @var string
	 */
	private $restId;

	/**
	 * @return BlogEntryEntity
	 */
	static function orm()
	{
		return BlogEntryEntity::getInstance();
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
	 * @param integer id
	 * @throws ArgumentException
	 * @return BlogEntry an object itself
	 */
	function setId(/* Integer */ $id = null)
	{
		$this->id = is_null($id) ? null : Integer::cast($id)->getValue();

		return $this;
	}

	/**
	 * @internal
	 * @return BlogEntry an object itself
	 */
	function _setId($id)
	{
		$this->setId($id);

		return $this;
	}

	/**
	 * @return integer|null
	 */
	function getId()
	{
		return $this->id;
	}

	/**
	 * @internal
	 * @return integer|null
	 */
	function _getId()
	{
		return $this->getId();
	}

	/**
	 * @param string title
	 * @throws ArgumentException
	 * @return BlogEntry an object itself
	 */
	function setTitle(/* String */ $title)
	{
		$this->title = String::cast($title)->getValue();

		return $this;
	}

	/**
	 * @return string
	 */
	function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param string text
	 * @throws ArgumentException
	 * @return BlogEntry an object itself
	 */
	function setText(/* String */ $text)
	{
		$this->text = String::cast($text)->getValue();

		return $this;
	}

	/**
	 * @return string
	 */
	function getText()
	{
		return $this->text;
	}

	/**
	 * @param Timestamp pubTime
	 * @throws ArgumentException
	 * @return BlogEntry an object itself
	 */
	function setPubTime(Timestamp $pubTime)
	{
		$this->pubTime = $pubTime;

		return $this;
	}

	/**
	 * @return Timestamp
	 */
	function getPubTime()
	{
		return $this->pubTime;
	}

	/**
	 * @param Date pubDate
	 * @throws ArgumentException
	 * @return BlogEntry an object itself
	 */
	function setPubDate(Date $pubDate)
	{
		$this->pubDate = $pubDate;

		return $this;
	}

	/**
	 * @return Date
	 */
	function getPubDate()
	{
		return $this->pubDate;
	}

	/**
	 * @param string restId
	 * @throws ArgumentException
	 * @return BlogEntry an object itself
	 */
	function setRestId(/* String */ $restId)
	{
		$this->restId = String::cast($restId)->getValue();

		return $this;
	}

	/**
	 * @return string
	 */
	function getRestId()
	{
		return $this->restId;
	}
}

?>