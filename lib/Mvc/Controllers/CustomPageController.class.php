<?php
/* ***********************************************************************************************
 *
 * Phoebius Framework
 *
 * **********************************************************************************************
 *
 * Copyright (c) 2009 phoebius.org
 *
 * This program is free software; you can redistribute it and/or modify it under the terms
 * of the GNU Lesser General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * You should have received a copy of the GNU Lesser General Public License along with
 * this program; if not, see <http://www.gnu.org/licenses/>.
 *
 ************************************************************************************************/

class CustomPageController extends BasePhoebiusController
{
	function action_404()
	{
		Header($this->getContext()->getAppContext()->getRequest()->getProtocol() . ' Not Found');

		$builder = XmlSiteDocBuilder::create(PHOEBIUS_SITE_DOCS_SRC_PATH . '/xml/site/404.xml');
		$this->getModel()->addCollection(array(
			'siteDoc' => $builder->build(),
			'breadScrumbs' => array(
				new ViewLink('404', '/404/'),
			),
		));

		return 'content';
	}
}

?>