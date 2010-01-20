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