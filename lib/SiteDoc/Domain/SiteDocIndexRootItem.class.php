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
final class SiteDocIndexRootItem extends SiteDocIndexItem
{
	private $httpRoot;

	function __construct()
	{
		parent::__construct('');
	}

	function getName()
	{
		return '';
	}

	/**
	 * @return void
	 */
	function build($httpRoot)
	{
		Assert::isScalar($httpRoot);

		$this->httpRoot = $httpRoot;

		$this->traverse($this);
	}

	private function traverse(ISiteDocIndexItem $item)
	{
		foreach ($item->getChildren() as $child) {
			if ($child instanceof SiteDocIndexXmlItem) {
				$this->buildChild($child);
			}

			if ($child->hasChildren()) {
				$this->traverse($child);
			}
		}
	}

	private function buildChild(SiteDocIndexXmlItem $child)
	{
		$filepath = $this->httpRoot . $child->getLink();
		if ($filepath{strlen($filepath) - 1} == '/') {
			$filepath .= 'index.html';
		}

		if (!is_dir(dirname($filepath))) {
			mkdir(dirname($filepath), 0755, true);
		}

		$presentation = new UIViewPresentation('content');
		$breadScrumbs = array();

		// traverse over parents
		$_ = $child;
		while (($_ = $_->getParent())) {
			if ($_->getName()) {
				array_unshift($breadScrumbs, new ViewLink($_->getName(), $_->getLink()));
			}
		}

		$presentation->setModel(
			new Model(array(
				'siteDoc' => $child->getDoc(),
				'siteDocIndexItem' => $child,
				'activeMenuItem' => $child->getSitePart(),
				'breadScrumbs' => $breadScrumbs,
			))
		);
		$presentation->setRouteTable(new PhoebiusRouter);

		$page = new UIPage($presentation);
		$page->render(new FileWriteStream($filepath));
	}
}

?>