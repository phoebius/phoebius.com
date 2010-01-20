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
 * @ingorup Phoebius_SiteDoc
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