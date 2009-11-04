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
 *
 * @ingroup Phoebius_DoxyGen
 */
class DoxyConfig
{
	private $options = array();

	/**
	 * @return DoxyConfig
	 */
	function add($option, $value)
	{
		if (!isset($this->options[$option])) {
			$this->options[$option] = array();
		}

		if (is_scalar($value)) {
			$value = array($value);
		}

		foreach ($value as $v) {
			$this->options[$option][] = $v;
		}

		return $this;
	}

	/**
	 * @return void
	 */
	function write(IOutput $output)
	{
		$options = array();
		foreach ($this->options as $option => $value) {
			if (!empty($value)) {
				$options[] = $option . ' = ' . $this->prepareValue($value[0]);

				foreach (array_slice($value, 1) as $value) {
					$options[] = $option . ' += ' . $this->prepareValue($value);
				}
			}
		}

		$output->write(join(StringUtils::DELIM_UNIX, $options));
	}

	/**
	 * @return string
	 */
	private function prepareValue($value)
	{
		return preg_replace("/\r?\n/", "\\\n", $value);
	}
}

?>