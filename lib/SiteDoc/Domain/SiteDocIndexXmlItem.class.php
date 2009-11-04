<?php
/* ***********************************************************************************************
 *
 * Phoebius Framework
 *
 * **********************************************************************************************
 *
 * Copyright (c) 2009 phoebius.org
 *
 * All rights reserved.
 *
 ************************************************************************************************/

/**
 * @ingroup Phoebius_SiteDoc_Domain
 */
class SiteDocIndexXmlItem extends SiteDocIndexItem
{
	/**
	 * @var string|null
	 */
	private $xmlDocPath;

	/**
	 * @var SiteDoc
	 */
	private $siteDoc;

	function __construct(
			$xmlDocPath, $link, SiteDocIndexItem $parent = null, $menuId = null
		)
	{
		Assert::isScalar($xmlDocPath);

		if (!file_exists($xmlDocPath)) {
			throw new ArgumentException('xmlDocPath', 'xml doc not found');
		}

		$this->xmlDocPath = $xmlDocPath;

		parent::__construct($link, $parent, $menuId);
	}

	/**
	 * @return string
	 */
	function getName()
	{
		return $this->getDoc()->getTitle();
	}

	/**
	 * @return SiteDoc
	 */
	function getDoc()
	{
		if (!$this->siteDoc) {
			$this->siteDoc =
				XmlSiteDocBuilder::create($this->xmlDocPath)
					->build();
		}

		return $this->siteDoc;
	}
}

?>