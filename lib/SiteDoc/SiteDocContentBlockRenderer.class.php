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
 * @ingroup Phoebius_SiteDoc
 */
class SiteDocContentBlockRenderer
{
	/**
	 * For headers
	 * @var int
	 */
	private $level = 2;

	/**
	 * @return SiteDocContentBlockRenderer
	 */
	static function create()
	{
		return new self;
	}

	/**
	 * @return SiteDocContentBlockRenderer
	 */
	function spawnNested()
	{
		$clone = clone $this;
		$clone->level++;

		return $clone;
	}

	/**
	 * @return string
	 */
	function getTitle($title)
	{
		Assert::isScalar($title);

		return "<h{$this->level}>{$title}</h{$this->level}>";
	}

	/**
	 * @return string
	 */
	function renderParagraph(DOMElement $node)
	{
		Assert::isTrue(
			$node->tagName == 'p'
		);

		return $this->wrap($node);
	}

	private function renderInnerNodes(DOMNode $node)
	{
		$yield = '';

		if (isset($node->childNodes)) {
			for ($i = 0; $i < $node->childNodes->length; $i++) {
				$yield .= $this->renderNode($node->childNodes->item($i));
			}
		}

		return $yield;
	}

	/**
	 * @return string
	 */
	private function renderNode(DOMNode $node)
	{
		switch ($node->nodeType) {
			case XML_CDATA_SECTION_NODE: {
				return $node->nodeValue;
			}
			case XML_TEXT_NODE: {
				return htmlspecialchars($node->nodeValue);
			}
			case XML_ELEMENT_NODE: {
				return $this->renderElementNode($node);
			}
			default: {
				Assert::isUnreachable(
					'not-renderable node type: %s (name: %s)',
					$node->nodeType,
					$node->nodeName
				);
			}
		}
	}

	/**
	 * @return string
	 */
	private function renderElementNode(DOMElement $node)
	{
		switch ($node->tagName) {
			case 'link': {
				return $this->renderLink($node);
			}

			case 'code-block': {
				return $this->renderCodeBlock($node);
			}

			default: {
				return $this->wrap($node);
			}
		}
	}

	/**
	 * @return string
	 */
	private function renderLink(DOMElement $node)
	{
		return
			'<a href="' . $node->getAttribute('to') . '">'
			. trim($this->renderInnerNodes($node))
			. '</a>';
	}

	/**
	 * FIXME: take "lang" attr into consideration
	 * @return string
	 */
	private function renderCodeBlock(DOMElement $node)
	{
		$yield = StringUtils::EMPTY_STRING;

		$codeBlockTitle = $node->getAttribute('title');

		if ($codeBlockTitle) {
			$yield .=
				'<h4 class="code">'
				. $codeBlockTitle
				. '</h4>';
		}

		return
			$yield
			. '<pre class="source">'
			. htmlspecialchars($this->renderInnerNodes($node))
			. '</pre>';
	}

	/**
	 * @return string
	 */
	private function wrap(DOMElement $node)
	{
		return "<{$node->tagName}>" . $this->renderInnerNodes($node) . "</{$node->tagName}>";
	}
}

?>