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
 * @ingroup SiteDoc
 */
class XmlReleaseSetBuilder extends ReleaseSetBuilder
{
	/**
	 * @var string
	 */
	private $xmlFilename;

	/**
	 * @var SmartSimpleXMLElement|null
	 */
	private $xmlElement;

	/**
	 * @return XmlReleaseSetBuilder
	 */
	static function create($xmlFilename)
	{
		return new self ($xmlFilename);
	}

	function __construct($xmlFilename)
	{
		Assert::isScalar($xmlFilename);

		if (!is_file($xmlFilename)) {
			throw new FileNotFoundException($xmlFilename);
		}

		$this->xmlFilename = $xmlFilename;
	}

	/**
	 * @return void
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
	}

	/**
	 * @return void
	 */
	private function import()
	{
		foreach ($this->xmlElement->release as $release) {
			$this->importRelease($release);
		}
	}

	private function importRelease(SmartSimpleXmlElement $releaseContainer)
	{
		$release = new Release;

		$release->setPage(
			isset($releaseContainer['page'])
				? (string) $releaseContainer['page']
				: '/downloads.html' // FIXME remove this hardcoded path
		);
		$release->setDate(new Date((string)$releaseContainer->date));
		$release->setVersion((string)$releaseContainer->version);
		$release->setAbout($releaseContainer->about->p->toDomNode());

		$this->addRelease(
			$release,
			isset($releaseContainer['latest']) && 'true' == $releaseContainer['latest']
		);
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