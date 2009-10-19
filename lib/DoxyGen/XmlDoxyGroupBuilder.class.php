<?php
/* ***********************************************************************************************
 *
 * Phoebius Framework
 *
 * **********************************************************************************************
 *
 * Copyright notice
 *
 ************************************************************************************************/

class XmlDoxyGroupBuilder extends DoxyGroupBuilder
{
	private $xmlFilename;

	/**
	 * @var SmartSimpleXmlElement|null
	 */
	private $xmlElement;

	function __construct($xmlFilename, DoxyGroup $rootDoxyGroup = null)
	{
		Assert::isScalar($xmlFilename);

		if (!is_file($xmlFilename)) {
			throw new FileNotFoundException($xmlFilename);
		}

		$this->xmlFilename = $xmlFilename;

		parent::__construct($rootDoxyGroup);
	}

	/**
	 * @return DoxyGroup
	 * @see DoxyGroupBuilder::build()
	 */
	function build()
	{
		try {
			$this->load();
			$this->traverse();
		}
		catch (Exception $e) {
			$this->dispose();

			throw $e;
		}

		$this->dispose();

		return $this->getRootDoxyGroup();
	}

	/**
	 * @return void
	 */
	private function traverse()
	{
		foreach($this->xmlElement->group as $group) {
			$this->traverseGroup($group, $this->getRootDoxyGroup());
		}
	}

	/**
	 * @return DoxyGroup
	 */
	private function traverseGroup(
			SimpleXMLElement $container,
			DoxyGroup $parent
	) {
		$group = $this->makeGroup($container, $parent);

		if (isset($container->includes)) {
			foreach ($container->includes->group as $inner) {
				$this->traverseGroup(
					$inner, $group
				);
			}
		}

		return $group;
	}

	/**
	 * @return DoxyGroup
	 */
	private function makeGroup(
			SimpleXMLElement $container,
			DoxyGroup $parent
	) {
		$group = new DoxyGroup(
			(string) $container['id'],
			$parent,
			($gid = (string) $container['gid'])
				? $gid
				: null
		);

		if (isset($container['name'])) {
			$group->setName((string)$container['name']);
		}

		if (isset($container['version'])) {
			$group->setVersion((string)$container['version']);
		}

		if (isset($container->about)) {
			$group->setAbout((string)$container->about);
		}

		return $group;
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
		chdir(dirname($this->xmlFilename));
		$xmlContents = file_get_contents($this->xmlFilename);

		try {
			$this->xmlElement = new SimpleXmlElement(
				$xmlContents,
				LIBXML_DTDATTR | LIBXML_DTDLOAD | LIBXML_DTDVALID
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