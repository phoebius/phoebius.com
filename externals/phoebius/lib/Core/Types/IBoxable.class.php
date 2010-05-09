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
 * Represents the boxed type.
 *
 * A boxable type is a type that can be accurately represented either as primitive or as an object
 * of the corresponding class.
 *
 * @ingroup Core_Types
 */
interface IBoxable extends IObjectCastable, IStringCastable
{
	// nothing here
}

?>