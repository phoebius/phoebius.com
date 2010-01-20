<?php
/* ***********************************************************************************************
 *
 * Phoebius Framework
 *
 * **********************************************************************************************
 *
 * Copyright (c) 2009 Scand Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under the terms
 * of the GNU Lesser General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * You should have received a copy of the GNU Lesser General Public License along with
 * this program; if not, see <http://www.gnu.org/licenses/>.
 *
 ************************************************************************************************/

/**
 * @ingroup Phoebius_SiteDoc
 */
class XmlSiteDocBuilder extends SiteDocBuilder
{
	private static $versionBinaryOperators = array(
		"eq" => BinaryLogicalOperator::EQUALS,
		"gt" => BinaryLogicalOperator::GREATER_THAN,
		"gteq" => BinaryLogicalOperator::GREATER_OR_EQUALS,
		"lt" => BinaryLogicalOperator::LOWER_THAN,
		"lteq" => BinaryLogicalOperator::LOWER_OR_EQUALS,
	);

	private $xmlFilename;

	/**
	 * @var SmartSimpleXmlElement|null
	 */
	private $xmlElement;

	/**
	 * @return XmlSiteDocBuilder
	 */
	static function create($xmlFilename, SiteDoc $siteDoc = null)
	{
		return new self ($xmlFilename, $siteDoc);
	}

	function __construct($xmlFilename, SiteDoc $siteDoc = null)
	{
		Assert::isScalar($xmlFilename);

		if (!is_file($xmlFilename)) {
			throw new FileNotFoundException($xmlFilename);
		}

		$this->xmlFilename = $xmlFilename;

		parent::__construct($siteDoc);
	}

	/**
	 * @return SiteDoc
	 */
	function build()
	{
		try {
			$this->load();
			$this->import();
		}
		catch (Exception $e) {
			$this->dispose();

			throw $e;
		}

		$this->dispose();

		return $this->getSiteDoc();
	}

	/**
	 * @return void
	 */
	private function import()
	{
		$this->getSiteDoc()->setTitle(
			htmlSpecialChars($this->xmlElement->title->getCdata())
		);
		$this->importChapters();
		$this->importAuthors();
		$this->importVersion();
	}

	/**
	 * @return void
	 */
	private function importChapters()
	{
		foreach ($this->xmlElement->chapters->chapter as $chapter) {
			$this->getSiteDoc()->addChapter(
				$this->buildChapter($chapter)
			);
		}
	}

	/**
	 * @return SiteDocChapter
	 */
	private function buildChapter(SimpleXMLElement $chapterContainer)
	{
		$chapter = new SiteDocChapter(
			isset($chapterContainer['title'])
				? (string) $chapterContainer['title']
				: null,
			'true' == $chapterContainer['block']
		);

		foreach ($chapterContainer as $elem) {

			switch ($elem->getName()) {
				case 'p': {
					$chapter->addParagraph(
						new SiteDocParagraph($elem)
					);

					break;
				}

				case 'subchapter': {
					$chapter->addSubChapter(
						$this->buildChapter($elem)
					);

					break;
				}

				default: {
					Assert::isUnreachable('unknown tag %s', $elem->getName());
				}
			}
		}

		return $chapter;
	}

	/**
	 * @return void
	 */
	private function importAuthors()
	{
		if (isset($this->xmlElement->authors)) {
			foreach ($this->xmlElement->authors->author as $author) {
				$this->getSiteDoc()->addAuthor(
					$this->buildAuthor($author)
				);
			}
		}
	}

	/**
	 * @return SiteDocAuthor
	 */
	private function buildAuthor(SimpleXMLElement $author)
	{
		return new SiteDocAuthor(
			(string) $author['title'],
			(string) $author
		);
	}

	/**
	 * @return void
	 */
	private function importVersion()
	{
		if (isset($this->xmlElement->version)) {
			return new SiteDocVersion(
				new BinaryLogicalOperator(
					self::$versionBinaryOperators[(string)$this->xmlElement->version['direction']]
				),
				htmlSpecialChars($this->xmlElement->getCdata())
			);
		}
	}

	/**
	 * @return void
	 */
	private function dispose()
	{
		$this->xmlElement = null;
	}

	/**
	 * @return void
	 */
	private function load()
	{
		try {
			$this->xmlElement = new SmartSimpleXmlElement(
				$this->xmlFilename,
				LIBXML_DTDATTR | LIBXML_DTDLOAD | LIBXML_DTDVALID | LIBXML_NOBLANKS,
				true
			);
		}
		catch (ExecutionContextException $e) {
			$xmlError = libxml_get_last_error();
			throw new StateException(
				$xmlError->message . ' in ' . $this->xmlFilename . ':' . $xmlError->line
			);
		}
	}
}

?>