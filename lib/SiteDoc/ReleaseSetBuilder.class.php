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
 * @ingorup SiteDoc
 */
abstract class ReleaseSetBuilder
{
	/**
	 * @var array of Release
	 */
	private $releases = array();

	/**
	 * @var Release
	 */
	private $latest;

	/**
	 * @return array of Release
	 */
	function getReleases()
	{
		return $this->rootIndex;
	}

	/**
	 * @return Release
	 */
	function getLatestRelease()
	{
		return $this->latest;
	}

	/**
	 * @return ReleaseSetBuilder
	 */
	protected function addRelease(Release $release, $isLatest = false)
	{
		$this->releases[$release->getDate()->getDayStartStamp()] = $release;

		if ($isLatest) {
			$this->latest = $release;
		}
		else {
			ksort($this->releases);
			$this->latest = end($this->releases);
		}

		return $this;
	}
}

?>