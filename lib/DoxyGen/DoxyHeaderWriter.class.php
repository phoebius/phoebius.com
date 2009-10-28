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
	function write(IOutput $ws)
	{
		$ws
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