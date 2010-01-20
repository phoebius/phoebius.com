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
 *
 * @ingroup Phoebius_DoxyGen
 */
class DoxyHeaderWriter
{
	/**
	 * @var DoxyGroup
	 */
	private $root;

	/**
	 * @return DoxyHeaderWriter
	 */
	static function create(DoxyGroup $rootDoxyGroup)
	{
		return new self ($rootDoxyGroup);
	}

	function __construct(DoxyGroup $rootDoxyGroup)
	{
		$this->root = $rootDoxyGroup;
	}

	/**
	 * @return void
	 */
	function write(IOutput $output)
	{
		$output
			->write($this->getHeader())
			->write($this->getBody())
			->write($this->getFooter());
	}

	private function getHeader()
	{
		return <<<EOT
<?php
/**

EOT;
	}

	private function getFooter()
	{
		return <<<EOT
 */
?>
EOT;
	}

	private $groupDefs = array();

	private function getBody()
	{
		$this->groupDefs = array();

		foreach ($this->root->getInner() as $group) {
			$this->traverse($group);
		}

		return join(StringUtils::DELIM_UNIX, $this->groupDefs);
	}

	private function traverse(DoxyGroup $dg)
	{
		$this->groupDefs[] = " * @defgroup {$dg->getGid()} {$dg->getId()}";
		if (($about = $dg->getAbout())) {
			$this->groupDefs[] = " * " . $about;
		}
		if (($parentGid = $dg->getParent()->getGid())) {
			$this->groupDefs[] = " * @ingroup " . $parentGid;
		}

		foreach ($dg->getInner() as $innerGroup) {
			$this->traverse($innerGroup);
		}
	}
}

?>