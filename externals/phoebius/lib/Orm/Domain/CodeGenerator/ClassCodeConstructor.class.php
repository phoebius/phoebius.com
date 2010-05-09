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
 * Represents a PHP class code generator
 *
 * @ingroup Orm_Domain_CodeGenerator
 */
abstract class ClassCodeConstructor extends CodeConstructor
{
	const NEW_LINE = "\n";

	/**
	 * Textual representation of properies to be presented in a class
	 *
	 * @var array
	 */
	protected $classProperties = array();

	/**
	 * Textual representation of methods to be presented in a class
	 *
	 * @var array
	 */
	protected $classMethods = array();

	/**
	 * Gets the name of the class to generate
	 *
	 * @return string
	 */
	abstract function getClassName();

	/**
	 * Determines whether the class is public
	 *
	 * @return boolean
	 */
	abstract function isPublicEditable();

	protected function getHeaderMessage()
	{
		if ($this->isPublicEditable()) {
			return <<<EOT
This file is public, and won't be regenerated explicitly. Feel free to modify and extend it.
EOT;
		}
		else {
			return <<<EOT
This is an auxiliary autogenerated file. Do not edit it as it can be regenerated implicitly!
EOT;
		}
	}

	final function make(IOutput $writeStream)
	{
		$this->classMethods = array();
		$this->classProperties = array();

		$this->findMembers();

		$writeStream
			->write($this->getFileHeader())
			->write($this->getClassHeader())
			->write($this->getClassBody())
			->write($this->getClassFooter())
			->write($this->getFileFooter());
	}

	/**
	 * Auxiliary method to generate textual representation of class members to be generated.
	 *
	 * Use ClassCodeConstructor::$classProperties and ClassCodeConstructor::$classMethods
	 *
	 * @return void
	 */
	protected function findMembers()
	{
		// nothing here
	}

	/**
	 * Adds the textual representation of a method to be presented in a generated class
	 *
	 * @param strign $phpCode
	 *
	 * @return ClassCodeConstructor itself
	 */
	protected function addMethod($phpCode)
	{
		$this->classMethods[] = $phpCode;

		return $this;
	}

	/**
	 * Adds the textual representation of a property to be presented in a generated class
	 *
	 * @param strign $phpCode
	 *
	 * @return ClassCodeConstructor itself
	 */
	protected function addProperty($phpCode)
	{
		$this->classProperties[] = $phpCode;

		return $this;
	}

	/**
	 * Gets the type of a class to be generated
	 *
	 * @return string final|abstract|null
	 */
	protected function getClassType()
	{
		return null;
	}

	/**
	 * Gets the name of a class to be used as parent for the generated class
	 *
	 * @return string|null
	 */
	protected function getExtendsClassName()
	{
		return null;
	}

	/**
	 * Gets the list of interfaces the generated class should implement
	 * @return array of string
	 */
	protected function getImplementsInterfaceNames()
	{
		return array();
	}

	private function getClassBody()
	{
		return
			join(self::NEW_LINE . self::NEW_LINE, $this->classProperties)
			. (!empty($this->classProperties) && !empty($this->classMethods)
				? self::NEW_LINE . self::NEW_LINE
				: ''
			)
			. join(self::NEW_LINE . self::NEW_LINE, $this->classMethods);
	}

	/**
	 * Gets the texutal representation of the comment to be prepended to class source
	 * @return string
	 */
	protected function getClassComment()
	{
		return <<<EOT
/**
 * Autogenerated class
 */
EOT;
	}

	private function getClassHeader()
	{
		if (($type = $this->getClassType())) {
			$type .= ' ';
		}

		if (($extends = $this->getExtendsClassName())) {
			$extends = ' extends ' . $extends;
		}
		else {
			$extends = '';
		}

		$interfaces = $this->getImplementsInterfaceNames();
		if (!empty($interfaces)) {
			$implements = ' implements ' . join(', ', $interfaces);
		}
		else {
			$implements = '';
		}

		return <<<EOT
{$this->getClassComment()}
{$type}class {$this->getClassName()}{$extends}{$implements}
{

EOT;
	}

	private function getClassFooter()
	{
		return <<<EOT

}
EOT;
	}
}

?>