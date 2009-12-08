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
 * Prefixes:
 *  - xmlRoot
 *    ability to set absolute or relative path to an xml document
 *  - uriPrefix
 *    prefix appended to relative locations of xml <doc> container
 * @ingroup Phoebius_SiteDoc
 */
class XmlSiteDocIndexBuilder extends SiteDocIndexBuilder
{
	/**
	 * @var string
	 */
	private $xmlFilename;

	/**
	 * @var SimpleXmlElement|null
	 */
	private $xmlElement;

	/**
	 * @var string|null
	 */
	private $xmlRoot;

	/**
	 * @var string|null
	 */
	private $prefix = null;

	/**
	 * @return XmlSiteDocIndexBuilder
	 */
	static function create($xmlFilename, $prefix = '/', SiteDocIndexItem $rootIndex = null)
	{
		return new self ($xmlFilename, $prefix, $rootIndex);
	}

	function __construct($xmlFilename, $prefix = '/', SiteDocIndexItem $rootIndex = null)
	{
		Assert::isScalar($xmlFilename);
		Assert::isScalar($prefix);

		if (!is_file($xmlFilename)) {
			throw new FileNotFoundException($xmlFilename);
		}

		$this->xmlFilename = $xmlFilename;
		$this->xmlRoot = dirname($xmlFilename);

		$this->prefix =
			$prefix == '/'
				? ''
				: rtrim($prefix, '/');

		parent::__construct($rootIndex);
	}

	/**
	 * @return SiteDocIndexItem
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

		return $this->getRootIndex();
	}

	/**
	 * @return void
	 */
	private function import()
	{
		if (isset($this->xmlElement['site-part'])) {
			$this->getRootIndex()->setSitePart(
				new SitePart((string)$this->xmlElement['site-part'])
			);
		}
		$this->traverse($this->getRootIndex(), $this->xmlElement);
	}

	private function traverse(SiteDocIndexItem $rootIndex, SimpleXMLElement $node)
	{
		foreach ($node as $innerNode) {
			$this->importItem($rootIndex, $innerNode);
		}
	}

	private function absolutizeLocation($location)
	{
		return
			($location && $location{0} == '/')
				? $location
				: $this->prefix . '/' . $location;
	}

	private function absolutizeXmlPath($xml)
	{
		return
			($xml && $xml{0} == '/')
				? $this->xmlRoot . $xml
				: dirname($this->xmlFilename) . '/' . $xml;
	}

	private function getHtmlUri($uri)
	{
		if ('/' == $uri{strlen($uri) - 1}) {
			//$uri .= 'index.html';
		}

		$uri = preg_replace('/\.xml$/i', '.html', $uri);

		return $uri;
	}

	private function importItem(SiteDocIndexItem $rootIndex, SimpleXMLElement $node)
	{
		switch ($node->getName()) {
			case "doc": {
				$item = new SiteDocIndexXmlItem(
					$this->absolutizeXmlPath((string) $node['xml']),
					$this->getHtmlUri(
						$this->absolutizeLocation(
							isset($node['location'])
								? (string) $node['location']
								: (string) $node['xml']
						)
					),
					$rootIndex,
					isset($node['site-part'])
						? new SitePart((string) $node['site-part'])
						: null
				);

				break;
			}
			case "ref": {
				$item = new SiteDocIndexRefItem(
					(string) $node['name'],
					$this->absolutizeLocation((string) $node['link']),
					$rootIndex,
					isset($node['site-part'])
						? new SitePart($node['site-part'])
						: null
				);

				break;
			}
			case "include": {
				$worker = new self (
					$this->absolutizeXmlPath((string) $node['xml']),
					$this->absolutizeLocation((string) $node['prefix']),
					$rootIndex
				);
				$worker->xmlRoot = $this->xmlRoot;

				$worker->build();

				return;
			}
			default: {
				Assert::isUnreachable('unknown item %s', $node->getName());
			}
		}

		$this->traverse($item, $node);
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
			$this->xmlElement = new SimpleXmlElement(
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