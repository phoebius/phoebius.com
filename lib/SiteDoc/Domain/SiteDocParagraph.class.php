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
 * @ingroup Phoebius_SiteDoc_Domain
 */
class SiteDocParagraph implements ISiteDocRenderable
{
	/**
	 * @var DOMElement
	 */
	private $node;

	/**
	 * @var SiteDocContentBlockRenderer
	 */
	private $renderer;

	function __construct(SimpleXMLElement $node)
	{
		// we can use only DOMDocument for parsing mixed content
		// see http://www.php.net/manual/en/ref.simplexml.php#76894
		// We also use dom_import_simplexml instead of DomDocument::loadXML($node->asXML())
		// because DOMDocument and SimpleXMLElement use libXML:
		// The second solution is to bypass SimpleXML for certain portions of your document.
		// One of the explicit design goals of PHP5's XML support was to allow all extensions to
		// interoperate at a minimal cost. Since LibXML2 is the lingua franca of all
		// XML extensions, DOM and SimpleXML objects can be exchanged with zero copies.
		// It's just a different way of viewing the same underlying object! By this method,
		// the DOM extension can "import" SimpleXML objects and use them as DOM objects,
		// and vice versa. When you need to use a DOM feature you can, and when you need
		// SimpleXML's ease of processing, you have that too.
		// http://devzone.zend.com/article/688
		$this->node = dom_import_simplexml($node);
	}

	/**
	 * @return string
	 */
	function toHtml(SiteDocContentBlockRenderer $renderer)
	{
		return $renderer->renderParagraph($this->node);
	}
}

?>