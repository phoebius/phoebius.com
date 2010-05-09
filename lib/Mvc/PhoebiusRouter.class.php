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
 * /
 * /news/
 * /feedback/
 * /search/
 * /admin/
 * /admin/announcement/?id
 * /admin/release/?id
 *
 * @ingroup Phoebius_Mvc
 */
class PhoebiusRouter extends ChainedRouter
{
	function __construct()
	{
		parent::__construct(new MvcDispatcher());

		$this->fillRoutes();
	}

	protected function fillRoutes()
	{
		$this->route(
			'feedback',
			'/feedback/',
			array('controller' => 'CustomPage', 'action' => 'feedback')
		);

		$this->route(
			'search',
			'/search/',
			array('controller' => 'CustomPage', 'action' => 'search')
		);

		$this->route(
			'adminEditAnnouncement',
			'/admin:controller/announcement/?id',
			array('action' => 'editAnnouncement')
		);

		$this->route(
			'adminNewAnnouncement',
			'/admin:controller/announcement/',
			array('action' => 'newAnnouncement')
		);

		$this->route(
			'adminEditRelease',
			'/admin:controller/release/?id',
			array('action' => 'editRelease')
		);

		$this->route(
			'adminNewRelease',
			'/admin:controller/release/',
			array('action' => 'newRelease')
		);

		$this->route(
			'adminReleases',
			'/admin:controller/releases/',
			array('action' => 'releases')
		);

		$this->route(
			'adminLogin',
			'/admin:controller/',
			array('action' => 'login')
		);

		$this->route(
			'news',
			'/news/',
			array('controller' => 'CustomPage', 'action' => 'newsList')
		);

		$this->route(
			'index',
			'/',
			array('controller' => 'CustomPage', 'action' => 'index')
		);

		$fallbackRoute = new Route(
			$this->getDefaultDispatcher(),
			ParameterImportRule::multiple(array(
				'controller' => 'CustomPage',
				'action' => '404'
			))
		);

		$this->setFallbackRoute($fallbackRoute);
	}
}

?>