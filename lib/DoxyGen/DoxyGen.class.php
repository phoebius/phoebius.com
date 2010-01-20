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
	 * @var array of string
	 */
	private $stripPaths = array();

	/**
	 * @var TempFile|null
	 */
	private $primaryConfig;

	/**
	 * @var array
	 */
	private $otherOpts = array();

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

		$this->stripPaths[] =
			is_file($inputPath)
				? dirname($inputPath)
				: $inputPath;

		return $this;
	}

	function setHtmlHeader($filepath)
	{
		$this->otherOpts['HTML_HEADER'] = $filepath;

		return $this;
	}

	function setHtmlFooter($filepath)
	{
		$this->otherOpts['HTML_FOOTER'] = $filepath;

		return $this;
	}

	function setOptions(array $options)
	{
		$this->otherOpts = array_merge($this->otherOpts, $options);

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
		$doxyConfig->add('STRIP_FROM_PATH', $this->stripPaths);
		$doxyConfig->add('INPUT', $this->inputPaths);

		foreach ($this->otherOpts as $key => $value) {
			$doxyConfig->add($key, $value);
		}

		$this->primaryConfig = new TempFile(false);
		$doxyConfig->write($this->primaryConfig);

		return $this->primaryConfig->getPath();
	}
}

?>