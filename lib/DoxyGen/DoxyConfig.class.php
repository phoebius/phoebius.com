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