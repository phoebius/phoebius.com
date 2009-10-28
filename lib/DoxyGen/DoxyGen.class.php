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

		foreach ($this->otherOpts as $key => $value) {
			$doxyConfig->add($key, $value);
		}

		$this->primaryConfig = new TempFile();
		$doxyConfig->write($this->primaryConfig);

		return $this->primaryConfig->getPath();
	}
}

?>