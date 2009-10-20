<?php
/* ***********************************************************************************************
 *
 * Phoebius Framework
 *
 * **********************************************************************************************
 *
 * Copyright (c) 2009 phoebius.org
 *
 * This program is free software; you can redistribute it and/or modify it under the terms
 * of the GNU Lesser General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * You should have received a copy of the GNU Lesser General Public License along with
 * this program; if not, see <http://www.gnu.org/licenses/>.
 *
 ************************************************************************************************/

class DoxyGen
{
	/**
	 * @var DoxyHeader
	 */
	private $header;

	/**
	 * @var string
	 */
	private $configPath;

	/**
	 * @var array of string
	 */
	private $inputPaths = array();

	/**
	 * @var TempFile|null
	 */
	private $primaryConfig;

	/**
	 * @return DoxyGen
	 */
	static function create($configPath)
	{
		return $this->configPath;
	}

	function __construct($configPath)
	{
		Assert::isScalar($configPath);

		$this->configPath = $configPath;
	}

	/**
	 * @return DoxyGen
	 */
	function addInputPath($inputPath)
	{
		$this->inputPaths[] = $inputPath;

		return $this;
	}

	/**
	 * @return void
	 */
	function make($outputPath)
	{
		$configPath = $this->getConfigPath($outputPath);

		chdir(dirname($this->configPath));
		exec('doxygen ' . escapeshellarg($configPath));
	}

	private function getConfigPath($outputPath)
	{
		$doxyConfig = new DoxyConfig;
		$doxyConfig->add('@INCLUDE', $this->configPath);
		$doxyConfig->add('OUTPUT_DIRECTORY', $outputPath);
		$doxyConfig->add('STRIP_FROM_PATH', $this->inputPaths);
		$doxyConfig->add('INPUT', $this->inputPaths);

		$this->primaryConfig = new TempFile();
		$doxyConfig->write($this->primaryConfig);

		return $this->primaryConfig->getPath();
	}
}

?>