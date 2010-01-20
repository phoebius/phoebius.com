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
 * @ingroup Phoebius_DoxyGen
 */
class XmlDoxyGroupBuilder extends DoxyGroupBuilder
{
	private $xmlFilename;

	/**
	 * @var SmartSimpleXmlElement|null
	 */
	private $xmlElement;

	/**
	 * @return XmlDoxyGroupBuilder
	 */
	static function create($xmlFilename, DoxyGroup $rootDoxyGroup = null)
	{
		return new self ($xmlFilename, $rootDoxyGroup);
	}

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
			SmartSimpleXmlElement $container,
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
			SmartSimpleXmlElement $container,
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
			$group->setAbout(
				htmlspecialchars(
					htmlSpecialChars($container->about->getCdata())
				)
			);
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