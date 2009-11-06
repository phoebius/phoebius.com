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
		}
	}

	private function buildChild(SiteDocIndexXmlItem $child)
	{
		$filepath = $this->httpRoot . $child->getLink();
		if ($filepath{strlen($filepath) - 1} == '/') {
			$filepath .= 'index.html';
		}

		if (!is_dir(dirname($filepath))) {
			mkdir(dirname($filepath), null, true);
		}

		$htmlRenderer =
			UIViewPresentation
				::view(
					'content',
					Model::from(array(
						'siteDoc' => $child->getDoc(),
						'siteDocIndexItem' => $child,
						'activeMenuItem' => $child->getSitePart(),
						'breadScrumbs' => array(
							new ViewLink('Support', '/support/'),
						),
					))
				)
			->render(new FileWriteStream($filepath));

		$this->traverse($child);
	}
}

?>